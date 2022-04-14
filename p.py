import sys
import face_recognition as fr
import numpy as np
import pickle
def cropped(image):
    
    try:
        face_location=fr.face_locations(image)
        top,right,bottom,left = face_location[0]
        image=image[top:bottom,left:right]
        return image
    except IndexError:
        return False
def loadImage(name):

    return fr.load_image_file(name)

def encode(image):
    try:
        return fr.face_encodings(image)[0]
    except:
        return False
        
def compare(img1,img2):
    return fr.compare_faces(img1,img2,tolerance=0.5)
   
id=sys.argv[1]

name = 'upload/'+id+'.jpg'
unknown_image=loadImage(name)
unknown_image=cropped(unknown_image)

if(isinstance(unknown_image,np.ndarray)):
    unknown_encode=encode(unknown_image)
    if(isinstance(unknown_encode,np.ndarray)):
        pickle_in=open("dict.pickle","rb")
        records=pickle.load(pickle_in)
        result=compare([unknown_encode],records[id])
        print(result[0])
    else:
        print(unknown_encode)
else:
    print(unknown_image)