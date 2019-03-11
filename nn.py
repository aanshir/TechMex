# -*- coding: utf-8 -*-
"""
Created on Sun Mar 10 23:20:03 2019

@author: Melvin
"""

import pandas as pd
import numpy as np
from sklearn.preprocessing import LabelEncoder, LabelBinarizer
from sklearn.model_selection import train_test_split
from keras.wrappers.scikit_learn import KerasClassifier
#from scipy.sparse import csr_matrix
from sklearn.model_selection import cross_val_score
from keras import Sequential
from sklearn.model_selection import KFold
from keras.layers import Dense, Flatten
from keras.metrics import top_k_categorical_accuracy
import sys
from keras.models import load_model
from operator import add

train=pd.read_csv(r'C:\Users\Melvin\Desktop\Machine Learning and Neural Networks\Crime Prediction\MCI_2014_to_2017.csv')
train.drop(['X','Y','Index_','event_unique_id','occurrencedate','reporteddate','premisetype','ucr_code','ucr_ext','offence','reportedyear',
            'reportedmonth','reportedday','reporteddayofyear','reporteddayofweek','reportedhour','Division','Hood_ID','Lat','Long','FID','occurrenceyear',
            'occurrenceday','occurrencedayofyear','occurrencehour'], axis=1,inplace=True)
train.dropna(inplace=True)

encoder1 = LabelBinarizer()
x1 = encoder1.fit_transform(train['occurrencemonth'])
encoder2 = LabelBinarizer()
x2 = encoder2.fit_transform(train['occurrencedayofweek'])
encoder3 = LabelBinarizer()
x3 = encoder3.fit_transform(train['MCI'])
X=np.append(x1,x2,axis=1)
X=np.append(X,x3,axis=1)

encoder4 = LabelBinarizer()
y = encoder4.fit_transform(train['Neighbourhood'])
y = y.reshape(131033,140)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)

def top_10_accuracy(y_true, y_pred):
    return top_k_categorical_accuracy(y_true, y_pred, k=10)

if sys.argv[0]==0:
    classifier = Sequential()
    classifier.add(Dense(256, activation='relu', kernel_initializer='random_normal', input_dim=24))
    classifier.add(Dense(192, activation='relu', kernel_initializer='random_normal'))
    classifier.add(Dense(168, activation='relu', kernel_initializer='random_normal'))
    classifier.add(Dense(140, activation='softmax', kernel_initializer='random_normal'))
            
    classifier.compile(loss='categorical_crossentropy', optimizer='adam', metrics=[top_10_accuracy])
        
    #estimator = KerasClassifier(build_fn=classifier_fn, epochs=100, batch_size=1000)
    #
    #kfold = KFold(n_splits=5, shuffle=True)
    #results = cross_val_score(estimator, X, y, cv=kfold)
    #print("Baseline: %.2f%% (%.2f%%)" % (results.mean()*100, results.std()*100))
    
    classifier.fit(X_train,y_train, batch_size=100, epochs=100)
    eval_model=classifier.evaluate(X_train, y_train)

elif sys.argv[0]==1:
    php_ocm=sys.argv[1]
    php_ocd=sys.argv[2]
    php_mci=sys.argv[3]
    
    pred1=encoder1.transform(php_ocm)
    pred2=encoder2.transform(php_ocd)
    pred3=encoder3.transform(php_mci)
    
    x_pred=np.append(pred1,pred2,axis=1)
    x_pred=np.append(x_pred,pred3,axis=1)
    x_pred=x_pred.reshape(1,24)
    
    cl = load_model(r'C:\Users\Melvin\Desktop\Machine Learning and Neural Networks\Crime Prediction\crime_pred.h5')
    y_pred=cl.predict(x_pred)
    classes=encoder4.classes_
    y_predl=[]
    for i in range(140):
        a=str(classes[i])
        b=y_pred[0,i]
        y_predl.append([a,b])

    y_predl.sort(key=lambda variable: variable[1], reverse=True)
        
elif sys.argv[0]==2:
    php_ocm=sys.argv[1]
    php_ocd=sys.argv[2]
    
    cl = load_model(r'C:\Users\Melvin\Desktop\Machine Learning and Neural Networks\Crime Prediction\crime_pred.h5')
    classes=encoder4.classes_
    y_pred_gen=[]
    
    for i in list(train['MCI'].unique()):
        php_mci=i
        
        pred1=encoder1.transform(php_ocm)
        pred2=encoder2.transform(php_ocd)
        pred3=encoder3.transform(php_mci)
        
        x_pred=np.append(pred1,pred2,axis=1)
        x_pred=np.append(x_pred,pred3,axis=1)
        x_pred=x_pred.reshape(1,24)

        y_pred=cl.predict(x_pred)[0]
        y_pred_gen.append(y_pred)

    yn_pred=np.divide((y_pred_gen[0]+y_pred_gen[1]+y_pred_gen[2]+y_pred_gen[3]+y_pred_gen[4]),np.array(5))
    y_predl=[]
    for i in range(140):
        a=str(classes[i])
        b=y_pred_gen[i]
        y_predl.append([a,b])

    y_predl.sort(key=lambda variable: variable[1], reverse=True)
        
        
        
    
    
    
    




