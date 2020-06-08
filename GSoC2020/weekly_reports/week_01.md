## Week 01 - (Jun 01 - Jun 07)

### Tasks scheduled for this week (Tasks 1-5)  
1. User import a video file (via direct upload or importing from a url)
*  layout for the webtool video uploader UI [[go to Figma]](https://www.figma.com/files/project/9936175/Webtool-Video-Uploaded) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
2. File/URL is validated (checking that the URL points to a video file) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)  
3. Check the database for duplicates (inform user/drop duplicate file) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
4. Check video width/height to make sure they meet a minimum constraint ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) 
5. Non-duplicate video is uploaded/scraped and stored ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)

### Challenges and solutions

I was facing some problems with implementing the size constraint for the videos. To get the dimensions of the video, I am using the getID3 php file, but that does not support all video formats (e.g. .mkv files are not supported). Moreover, it requires the actual path of the file to be uploaded on the user's computer that can lead to privacy issues. Though it works fine on my computer, this access may not be allowed on a random user's computer. So I have decided to explore other ways of resolving this issue in the next week, so that this check would not have to be performed only after the file is uploaded on the server.

### Tasks postponed to next week
Task 4: Size constraints on video to be uploaded.

### Observations
In the preprocessing tool, the user can choose to upload a video from his local computer or provide a url. In the first case, various constraints such as duplicacy of files, size constraints as well as availability of files are checked before being uploaded. If the constraints are met, the video file is stored with its SHA1 hash value on the server. In the second case, the validity of the URL is checked based on regexes for Youtube videos. The options of selecting language, corpus and document from the webtool MySQL database (webtool_db) is provided to the user as well. 

## Week 02 - (Jun 08 - Jun 14)  

### Tasks scheduled for this week (Tasks 6, 9 and 10) 
6. Audio track extracted and converted (FLAC / 44,100 Hz / Mono) and stored  
9. Audio file uploaded to Cloud Storage/Speech API  
10. Transcription returns from Cloud Speech API and stored  

Remember to use tags! You can add multiple tags to any task.

![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) = done and ready for User Acceptance Testing (UAT)<br>
![uat-passed](https://img.shields.io/static/v1?label=UAT&message=passed&color=success) = tested and ready to merge with Master<br>
![deployed](https://img.shields.io/static/v1?label=&message=deployed&color=success) = merged with Master<br>
![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) = task deferred from one week to the next<br>
![help](https://img.shields.io/static/v1?label=&message=need_help&color=blue) = needs help from mentors<br>
![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange) = **blocked** task that needs discussion with mentors<br>
![important](https://img.shields.io/static/v1?label=&message=important&color=red) = something that needs to be addressed immediately<br>

Use [Shields.io](https://shields.io) to creat new tags if needed.

