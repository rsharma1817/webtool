## Week 01 - (Jun 01 - Jun 07)

### Tasks scheduled for this week

- Create the `globalfn` Python library for retrieving annotations ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Embed the n-gram of the sentence **(en, pt, de)** with multilingual BERT embeddings.![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Identify words tagged with the most common POS tags in the transcript.![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Lemmatize the words using spaCy. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Translate the lemmas into English using multilingual BabelNet or WordNet synsets. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Identify LUs from the translated words using the method ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)`nltk.corpus.framenet.lus(word)`
-  Create a multinomial log-linear classifier using the Python `sklearn` library ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Train the classifier to identify semantic frames with the combined train and test dataset from https://github.com/andersjo/any-language-frames ![ongoing](https://img.shields.io/static/v1?label=&message=ongoing&color=yellow)

### Challenges and solutions

- Case sensitivity in the Extended Open Multilingual WordNet (especially when the sentences from the TED Transcript is no lemmatized and tokenized)
  - A simple heuristic is to lowercase all the lemmas (as Spacy lemmatization doesn't factor in case sensitivity). However, this quick fix may introduce problem when the word is a proper noun. ![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange)
- Not only that BabelNet has 1000 API request per day constraint, but it is difficult to extract the translations from BabelNet with a readily available Python library
- The Open Multilingual WordNet on NLTK does not include German. 
  - The fix is to obtain the dataset for Extended Open Multilingual WordNet and maps the lemmas to the wordnet synset manually. 

### Ongoing Task / Tasks postponed to next week

- The frame classifier is still undergoing training.

### Summary

1. `globalfn`![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)

2. LU identification for **(en, pt, de) **![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
3. Frame induction for **(en, pt, de)** ![ongoing](https://img.shields.io/static/v1?label=&message=ongoing&color=yellow)

---

Remember to use tags! You can add multiple tags to any task.

![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) = done and ready for User Acceptance Testing (UAT)<br>
![uat-passed](https://img.shields.io/static/v1?label=UAT&message=passed&color=success) = tested and ready to merge with Master<br>
![deployed](https://img.shields.io/static/v1?label=&message=deployed&color=success) = merged with Master<br>
![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) = task deferred from one week to the next<br>

![ongoing](https://img.shields.io/static/v1?label=&message=ongoing&color=yellow)= task is still under development / model is still being trained<br>

![help](https://img.shields.io/static/v1?label=&message=need_help&color=blue) = needs help from mentors<br>
![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange) = **blocked** task that needs discussion with mentors<br>
![important](https://img.shields.io/static/v1?label=&message=important&color=red) = something that needs to be addressed immediately<br>

Use [Shields.io](https://shields.io) to creat new tags if needed.

