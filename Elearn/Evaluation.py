import cv2
import sys
import face_recognition
import os

casPath = cv2.data.haarcascades+'haarcascade_frontalface_default.xml'
#eyesPath = cv2.data.haarcascades+'haarcascades_eye.xml'
#eyeCascade = cv2.CascadeClassifier(eyesPath)
faceCascade = cv2.CascadeClassifier(casPath)

#print(face_recognition.face_landmarks(unknown_image)) compare deux photos
def DeleteFakePicture(image):
	if(FaceDetection(image)==0):
		os.remove(image)
		return 0
	else:
		if(len(Face(image))<1):
			os.remove(image)

			return 0

def Face(img):
	image = face_recognition.load_image_file(img)
	face_locations  = face_recognition.face_locations(image)
	return face_locations

def Recognize(image1,image2):
	known_image = face_recognition.load_image_file(image1)
	unknown_image = face_recognition.load_image_file(image2)

	amy_encoding = face_recognition.face_encodings(known_image)[0]
	unknown_encoding = face_recognition.face_encodings(unknown_image)[0]
	results = face_recognition.compare_faces([amy_encoding],unknown_encoding)

	return results
	#print(known_image)
def convertToRGB(image):
	return cv2.cvtColor(image,cv2.COLOR_BGR2GRAY)

#Detecte le nombre de visage dans une image
def FaceDetection(image):
	#Chargement de l'image
	test_image = cv2.imread(image)
	test_image_gray = cv2.cvtColor(test_image,cv2.COLOR_BGR2GRAY)
	#chargement et detection des visages
	haar_cascade_face = cv2.CascadeClassifier(cv2.data.haarcascades+'haarcascade_frontalface_default.xml')
	faces_rects = haar_cascade_face.detectMultiScale(test_image_gray,scaleFactor=1.2,minNeighbors=5);

	return len(faces_rects)
#active la Webcam pour la capture
def WebCam (path,nom_fichier):
	video_capture = cv2.VideoCapture(0)
	count = 0
	image = nom_fichier
	if video_capture.isOpened():
		while True:
			ret,frame = video_capture.read()

			gray = cv2.cvtColor(frame,cv2.COLOR_BGR2GRAY)

			faces = faceCascade.detectMultiScale(
				gray,
				scaleFactor=1.1,
				minNeighbors=5,
				minSize=(255,255),
				flags = cv2.COLOR_BGR2GRAY)
		

			cv2.imshow('Video',frame)

			for (x,y,w,h) in faces:
				cv2.rectangle(frame,(x,y),(x+w,y+h),(0,255,0),2)
				cv2.putText(frame,'Armel',(x-1,y-1),cv2.FONT_HERSHEY_PLAIN,4,(0,255,0))
				cv2.imshow('Video',frame)
				convertToRGB(frame)
				#Sauvegarde
				img = ""+path+"/"+image+""+".jpg"
				cv2.imwrite(img,gray[y:y+h,x:x+w])
				if(DeleteFakePicture(img)!=0):
					count+=1
				
				#print(count)
			#cv2.imshow('image',frame)
			k = cv2.waitKey(40) & 0xff

			if (k == 27)& (count>=1) : #ECHAP
				break
			if count>=1:
				break
		video_capture.release()
		cv2.destroyAllWindows()
	else:
		return -1

def Init(path,nom_fichier):
	result = 0
	for f in os.listdir(path):
		if(f != nom_fichier):
			count = Recognize(path+""+f,path+""+nom_fichier+".jpg")
			if(count[0]==True):
				result = result + 1
				
	return result

path = sys.argv[1]
image = sys.argv[2]

if(WebCam(path,image)!=-1):
	result = Init(path,image)
	print(result)
else:
	print(-1)