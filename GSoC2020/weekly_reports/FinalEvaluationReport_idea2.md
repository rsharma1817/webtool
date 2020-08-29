## Coding Phase 1
### Tasks scheduled for this month (Jun 1- Jul 1): Week 1-4
1. User import a video file (via direct upload or importing from a url) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
2. File/URL is validated (checking that the URL points to a video file) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
3. Check the database for duplicates (inform user/drop duplicate file) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
4. Check video width/height to make sure they meet a minimum constraint ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
5. Non-duplicate video is uploaded/scraped and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
6. Audio track extracted and converted (FLAC / 44,100 Hz / Mono) and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
7. Video converted (MP4/H.264) and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
8. Video thumbnails generated and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
9. Audio file uploaded to Cloud Storage/Speech API ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
10. Transcription returns from Cloud Speech API and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
11. Subtitles extracted from video with Python-tesseract and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
12. Transcription and subtitles synced/aligned and merged into a single text file ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
13. User review the video and sentences (side by side) for validation ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
14. Transcriptions and subtitles are organized into sentences and stored according to the Webtool standard ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
15. Reviewed file is uploaded to the FrameNet Webtool ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  

## Coding Phase 2
### Tasks scheduled for this month (Jul 3- Jul 27)- Week 5-8
1. The preprocessed video from the previous pipeline is imported into the webtool from the server. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
2. To annotate a sentence, the start and end timestamps of that sentence are chosen. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
3. Run the video with each frame having a time gap of 1 second. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
4. Objects in a frame will be detected automatically using YOLO (You Look Only Once), which will also create bounding boxes around them. In case COCO does not perform well, a new model will be trained using the Open Images dataset, and in addition, changes to the code for obtaining the actual pixel coordinates will also be made. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
5. The coordinates of the pixels that serve as corners to a detected object's bounding box will be saved in a list. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
6. For the following 5 frames, the KLT (Kanade-Lucas-Tomasi) feature tracking algorithm will track these objects by interpolating the current coordinates of the detected objects. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
7. The 5 frame constraint is kept for each detected object that is to be tracked, to ensure that it is present in the video for at least five seconds, otherwise tracking it is not useful and won't help in annotation. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
8. If the image for an object is generated after the previous step is performed, a minimum size constraint and image quality resolution will have to be met to save the image. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
9. The generated images will be stored in the OBJECTS_STORE folder. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
10. Using a windowing technique, the same object detection and tracking process from steps 4 to 9 will be followed for the duration of the video. Every new object that is tracked successfully will be added to the list storing the coordinates. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
11. The generated images will be shown to the user for validation. An option for manual creation of bounding boxes will be provided if the user is not satisfied. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
12. Identified objects in the video will be stored in the ObjectMM table of the webtool database ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  


## Coding Phase 3
### Tasks scheduled for this month (Aug 1- Aug 27)- Week 9-12

1. Add code to generate XML for VATIC object tracking ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
2. Frames annotated in text and in the video per corpus ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
3. Frames annotated in text and in the video per document ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
4. Frames annotated in text and in the video per sentence ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
5. Frames and Frame Elements annotated in text and in the video per corpus ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
6. Frames and Frame Elements annotated in text and in the video per document ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
7. Frames and Frame Elements annotated in text and in the video per sentence ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
8. Frames annotated in text and in the video according to the (a)sychronicity in the corpus. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
9. Frames annotated in text and in the video according to the (a)sychronicity in the document. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
10. Frames annotated in text and in the video according to the (a)sychronicity in the sentence. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
11. Frames and Frame Elements annotated in text and in the video according to the (a)sychronicity in the corpus. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
12. Frames and Frame Elements annotated in text and in the video according to the (a)sychronicity in the document. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
13. Frames and Frame Elements annotated in text and in the video according to the (a)sychronicity in the sentence. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
14. YOLO recognized objects matching Frames and Frame Elements in the bounding boxes per corpus. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
15. YOLO recognized objects matching Frames and Frame Elements in the bounding boxes per document. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
16. YOLO recognized objects matching Frames and Frame Elements in the bounding boxes per sentence. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
17. Ternary qualia relations connecting an LU in the text with any of the LUs in a frame annotated in the video. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) 




