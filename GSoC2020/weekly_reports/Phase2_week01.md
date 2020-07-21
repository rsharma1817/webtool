## Week 01 - (July 03 - July 10)

### Tasks scheduled for this week

1. The preprocessed video from the previous pipeline is imported into the preprocessing tool from the server. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
2. To annotate a sentence, the start and end timestamps of that sentence are chosen. ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)
3. Run the video with each frame having a time gap of 1 second, using VATIC.js. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
4. Objects in a frame will be detected automatically using a trained object detection model, which will also create bounding boxes around them. Changes to the code for obtaining the actual pixel coordinates of bounding boxes will also be made. ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)
5. The coordinates of the pixels that serve as corners to a detected object's bounding box will be saved in a list or csv file ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)


### Challenges and solutions

The model training is taking some time due to the complexity of the network and dataset size, which I tried to perform on my local machine, and am now running on a Kaggle kernel. The results will be ready for testing within the next few days. 


### Tasks completed

....

### Tasks postponed to next week

2. To annotate a sentence, the start and end timestamps of that sentence are chosen. 
4. Objects in a frame will be detected automatically using a trained object detection model, which will also create bounding boxes around them. Changes to the code for obtaining the actual pixel coordinates of bounding boxes will also be made.
...

### Observations

...

## Week 02 - (July 11 - July 20)

### Tasks scheduled for this week

2. To annotate a sentence, the start and end timestamps of that sentence are chosen. ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
4. Objects in a frame will be detected automatically using a trained object detection model, which will also create bounding boxes around them. Changes to the code for obtaining the actual pixel coordinates of bounding boxes will also be made. ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
6. For the following 5 frames, the KLT (Kanade-Lucas-Tomasi) feature tracking algorithm will track these objects by interpolating the current coordinates of the detected objects. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
7. The 5 frame constraint is kept for each detected object that is to be tracked, to ensure that it is present in the video for at least five seconds, otherwise tracking it is not useful and won't help in annotation. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
10. Using a windowing technique, the same object detection and tracking process from steps 4 to 9 will be followed for the duration of the video. Every new object that is tracked successfully will be added to the list storing the coordinates. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)

---
Remember to use tags! You can add multiple tags to any task.

![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) = done and ready for User Acceptance Testing (UAT)<br>
![uat-passed](https://img.shields.io/static/v1?label=UAT&message=passed&color=success) = tested and ready to merge with Master<br>
![deployed](https://img.shields.io/static/v1?label=&message=deployed&color=success) = merged with Master<br>
![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) = task deferred from one week to the next<br>
![help](https://img.shields.io/static/v1?label=&message=need_help&color=blue) = needs help from mentors<br>
![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange) = **blocked** task that needs discussion with mentors<br>
![important](https://img.shields.io/static/v1?label=&message=important&color=red) = something that needs to be addressed immediately<br>

Use [Shields.io](https://shields.io) to creat new tags if needed.

