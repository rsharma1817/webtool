## Week 01 - (Jun 01 - Jun 07)

### Tasks scheduled for this week (Tasks 1-5)  
1. User import a video file (via direct upload or importing from a url)
*  layout for the webtool video uploader UI [[go to Figma]](https://www.figma.com/files/project/9936175/Webtool-Video-Uploaded) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
2. File/URL is validated (checking that the URL points to a video file) ![uat-failed](https://img.shields.io/static/v1?label=UAT&message=failed&color=red) ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)
3. Check the database for duplicates (inform user/drop duplicate file) ![uat-failed](https://img.shields.io/static/v1?label=UAT&message=failed&color=red) ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)
4. Check video width/height to make sure they meet a minimum constraint ![uat-passed](https://img.shields.io/static/v1?label=UAT&message=passed&color=success)
5. Non-duplicate video is uploaded/scraped and stored ![uat-failed](https://img.shields.io/static/v1?label=UAT&message=failed&color=red) ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)

### Challenges and solutions

I was facing some problems with implementing the size constraint for the videos. To get the dimensions of the video, I am using the getID3 php file, but that does not support all video formats (e.g. .mkv files are not supported). Moreover, it requires the actual path of the file to be uploaded on the user's computer that can lead to privacy issues. Though it works fine on my computer, this access may not be allowed on a random user's computer. So I need help to find a way to perform this check only after the file is uploaded on the server. Both getID3 and ffmpeg require the user file's path details.  

### Tasks postponed to next week
2. File/URL is validated (checking that the URL points to a video file)
3. Check the database for duplicates (inform user/drop duplicate file) 
5. Non-duplicate video is uploaded/scraped and stored 

### Observations
In the preprocessing tool, the user can choose to upload a video from his local computer or provide a url. In the first case, various constraints such as duplicacy of files, size constraints as well as availability of files are checked before being uploaded. If the constraints are met, the video file is stored with its SHA1 hash value on the server. In the second case, the validity of the URL is checked based on regexes for Youtube videos. The options of selecting language, corpus and document from the webtool MySQL database (webtool_db) is provided to the user as well. 

## Week 02 - (Jun 08 - Jun 14)  

### Tasks scheduled for this week (Tasks 6, 9 and 10) 
2. File/URL is validated (checking that the URL points to a video file) ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)
3. Check the database for duplicates (inform user/drop duplicate file) ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)
5. Non-duplicate video is uploaded/scraped and stored ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)
6. Audio track extracted and converted (FLAC / 44,100 Hz / Mono) and stored  ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)

![important](https://img.shields.io/static/v1?label=&message=important&color=red)<br>*keep in mind that FLAC/44.1KHz/Mono is just an example of the most common file specification for speech-to-text. Check for **real specifications** on the documentation of the platform you chose.*

9. Audio file uploaded to Cloud Storage/Speech API ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) 
10. Transcription returns from Cloud Speech API and stored ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)

### Observations
I am facing some issues with integrating the backend functions with the React frontend, especially with the modal box rendering (since the formats are different in PHP and React) and MySQL connectivity. I was working on the week 2 tasks, but then had to shift in between to React and change the platform again, therefore, this is causing some delay, but these will be resolved by tomorrow. I can then start working on the other tasks that are scheduled for this week. The React frontend files for the new tool are updated in the Github master branch. 

## Week 03 - (Jun 15 - Jun 22)  

### Tasks scheduled for this week (Tasks 7, 8 and 11) 
2. File/URL is validated (checking that the URL points to a video file) ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
3. Check the database for duplicates (inform user/drop duplicate file) ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
5. Non-duplicate video is uploaded/scraped and stored ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) 
6. Audio track extracted and converted (FLAC / 44,100 Hz / Mono) and stored ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)

![important](https://img.shields.io/static/v1?label=&message=important&color=red)<br>*keep in mind that FLAC/44.1KHz/Mono is just an example of the most common file specification for speech-to-text. Check for **real specifications** on the documentation of the platform you chose.*

7.Video converted (MP4/H.264) and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
8.Video thumbnails generated and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
9. Audio file uploaded to Cloud Storage/Speech API ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
10. Transcription returns from Cloud Speech API and stored ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
11.Subtitles extracted from video with Python-tesseract and stored ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)

## Week 04 - (Jun 22 - Jul 1)  

### Tasks scheduled for this week (Tasks 12, 13, 14 and 15) 
11.Subtitles extracted from video with Python-tesseract and stored ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
12. Transcription and subtitles synced/aligned and merged into a single text file; ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)    
13. User review the video and sentences (side by side) for validation;  ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)   
14. Transcriptions and subtitles are organized into sentences and stored according to the Webtool standard;  ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)    
15. Reviewed file is uploaded to the FrameNet Webtool.  ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  

Remember to use tags! You can add multiple tags to any task.

![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) = done and ready for User Acceptance Testing (UAT)<br>
![uat-passed](https://img.shields.io/static/v1?label=UAT&message=passed&color=success) = tested and ready to merge with Master<br>
![deployed](https://img.shields.io/static/v1?label=&message=deployed&color=success) = merged with Master<br>
![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) = task deferred from one week to the next<br>
![help](https://img.shields.io/static/v1?label=&message=need_help&color=blue) = needs help from mentors<br>
![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange) = **blocked** task that needs discussion with mentors<br>
![important](https://img.shields.io/static/v1?label=&message=important&color=red) = something that needs to be addressed immediately<br>

Use [Shields.io](https://shields.io) to creat new tags if needed.

