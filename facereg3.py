import face_recognition
import cv2
import argparse
import pickle
import imutils
from subprocess import call
import time
import RPi.GPIO as GPIO


ap = argparse.ArgumentParser()
ap.add_argument("-c", "--cascade", required=True,
    help = "path to where the face cascade resides")
ap.add_argument("-e", "--encodings", required=True,
    help="path to serialized db of facial encodings")
args = vars(ap.parse_args())

print("[INFO] loading encodings + face detector...")
data = pickle.loads(open(args["encodings"], "rb").read())
detector = cv2.CascadeClassifier(args["cascade"])

video_capture = cv2.VideoCapture(0)

# Initialize some variables
face_locations = []
face_encodings = []
names = []
process_this_frame = True
face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
eye_cascade = cv2.CascadeClassifier('haarcascade_eye.xml')

#push button pin 7
#servo pin 22
#led hijau pin 18
#led merah pin 16
def servo():
  
    GPIO.setwarnings(False)
    GPIO.setmode(GPIO.BOARD)    
    GPIO.setup(18,GPIO.OUT)
    GPIO.output(18,GPIO.HIGH)
   
    
    GPIO.setup(22,GPIO.OUT)
    pwm=GPIO.PWM(22,50)# 50hz frequency
    pwm.start(0)# starting duty cycle ( it set the servo to 0 degree )
                    
    def SetAngle(angle):
        duty = angle / 18 + 2
        GPIO.output(22, True)
        pwm.ChangeDutyCycle(duty)
        time.sleep(1)
        GPIO.output(22, False)
        pwm.ChangeDutyCycle(0)

                        
    SetAngle(90)
    time.sleep(7)
    SetAngle(0)
    GPIO.output(18,GPIO.LOW)
    pwm.stop()
    GPIO.cleanup()
        
    return    
    
def led():
    GPIO.setwarnings(False)
    GPIO.setmode(GPIO.BOARD)
    GPIO.setup(16,GPIO.OUT)
    GPIO.output(16,GPIO.HIGH)
    time.sleep(4)
    GPIO.output(16,GPIO.LOW)
    GPIO.cleanup()
    
def fotos():
    while True:
            success,image = video_capture.read()
            print ('Read a new frame: ', success)
            cv2.imwrite("frame.jpg", image)
            photofile = "/home/pi/Dropbox-Uploader/dropbox_uploader.sh upload /home/pi/Faceajay/frame.jpg terdeteksi-orang/orang.jpg"   
            call ([photofile], shell=True)
            done = 1
            if done == 1:
                print('Tunggu.......')
                break
               
def compare():
        global process_this_frame
    # Find all the faces and face encodings in the current frame of video
        face_locations = face_recognition.face_locations(rgb_small_frame)
        face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)
        
        names = []
        print ('Sedang di Cek...')
        for face_encoding in face_encodings:
            # See if the face is a match for the known face(s)
            matches = face_recognition.compare_faces(data["encodings"],
                      face_encoding)
            name = "Unknown"
        
            # If a match was found in known_face_encodings, just use the first one.
            if True in matches:
                matchedIdxs = [i for (i, b) in enumerate(matches) if b]
                counts = {}
                for i in matchedIdxs:
                    name = data["names"][i]
                    counts[name] = counts.get(name, 0) + 1
                    name = max(counts, key=counts.get)
                    print (name)
                    servo()
                    dataas = 1
                    if dataas == 1:
                        break
            
            elif False in matches:
                    print ('Data Salah')
                    led()
            
            names.append(name)
            process_this_frame = not process_this_frame
            fotos()
                    

            
            
while True:
    # Grab a single frame of video
    ret, frame = video_capture.read()
    
    # Resize frame of video to 1/4 size for faster face recognition processing
    small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)

    # Convert the image from BGR color (which OpenCV uses) to RGB color (which face_recognition uses)
    rgb_small_frame = small_frame[:, :, ::-1]
    

    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.3, 5)
    for (x,y,w,h) in faces:
        cv2.rectangle(frame,(x,y),(x+w,y+h),(255,0,0),2)
        roi_gray = gray[y:y+h, x:x+w]
        roi_color = frame[y:y+h, x:x+w]
        Cface = [(w/2+x),(h/2+y)]
        print
        str(Cface[0])+","+str(Cface[1])
        eyes = eye_cascade.detectMultiScale(roi_gray)
        for (ex,ey,ew,eh) in eyes:
            cv2.rectangle(roi_color,(ex,ey),(ex+ew,ey+eh),(0,255,0),2)
    
    print('Sesuaikan Wajah depan kamera, lalu Tekan tombol')
    
        
    GPIO.setwarnings(False)
    GPIO.setmode(GPIO.BOARD)
    pin = 7

    GPIO.setup(pin, GPIO.IN, pull_up_down=GPIO.PUD_UP)
    
    input_state = GPIO.input(pin)
    if input_state == False :
        print('switch ditekan')
        compare()
    # Only process every other frame of video to save time
    
        
    # Display the results
   
    cv2.imshow('Video', frame)
    

    # Hit 'q' on the keyboard to quit!
    if cv2.waitKey(1) & 0xFF == ord('a'):
        break

# Release handle to the webcam
video_capture.release()
cv2.destroyAllWindows()
