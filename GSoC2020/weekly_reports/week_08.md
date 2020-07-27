# Week 08 - (Jul 20 - Jul 26)

## Tasks scheduled for this week
- [X] Check in with mentors ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- [X] Documentation of the codes with more docstrings ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- [X] (Stretch Goal) Write a Blog Post about my progress and the results gotten so far ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- [X] Parsing Portuguese sentences with SketchEngine (I've checked in with Prof. Tiago and asked for help) ![help](https://img.shields.io/static/v1?label=&message=need_help&color=blue) ![carryover](https://img.shields.io/static/v1?label=carryover&message=continue_next_week&color=yellow)
- [X] Explore other word-alignment models ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) 
- [X] Annotation Transfer with neural networks model 
  - [X] Research Idea 1: Implement a better multilingual parser using transformers and then correct the labels using annotated data. ![definition](https://img.shields.io/static/v1?label=result&message=disappointing&color=orange)
  - [X] Research Idea 2: Given the source sentence, the sequence of labels, and the target sentence, generate a sequence of labels for the target sentence. Inspiration: Google T5 model (released 2020) that can learn from a text-to-text transfer learning task.  ![definition](https://img.shields.io/static/v1?label=result&message=disappointing&color=orange)

## What I Learn from Mentors' Meetings
- I should try out other word-alignment models since I have only used `fast_align`, which only implements IBM GIZA++ Model 2.
  1. I attempted to implement IBM GIZA++ latest version (Model 5) using the `nltk.align` package but it relies on classifying the words into 50 classes before parsing. The code for classification is [here](http://www.fjoch.com/mkcls.html) but I run into CompilerError when I used the provided files. 
  2. I found a recently published [paper](https://arxiv.org/abs/2004.14675) (Zenkel et al., 2020) on an end-to-end neural model that outperforms GIZA++ but no code is provided.
- Arthur has pre-trained a language model which is fine-tuned for FrameNet. I should look into representing words using Arthur's model instead of using pre-trained language models.
- I need to explain the result obtained thus far (such as the interpretation of the hamming-loss, etc.)
- I can use Sketch-Engine to obtain the constituents of Portuguese sentences.
- It's worth exploring methods that improve the annotation transfer to DE (since the [training dataset](https://github.com/andersjo/any-language-frames) includes DE data) and enable few-shot/zero-shot annotation transfer to PT (since the [training dataset](https://github.com/andersjo/any-language-frames) does not include PT data)
  1. **Research Idea 3**: I found a recently published paper "Cross-Lingual Semantic Role Labeling with High-Quality Translated Training Corpus"
 (in ACL 2020) that performs translation-based projection. They also provide their [implementation](https://github.com/scofield7419/XSRL-ACL/tree/master/Projection) on GitHub. 
  2. **Research Idea 4**: Create representations for frames and frame elements (fine-grained semantic role labels) through average pooling and use a neural network to identify two things for the target sentence: (1) does the target sentence evoke the frame and contain the frame elements projected from the source sentence? (2) if so, which words in the target sentence are the lexical units and frame elements?

## Research Experimental Results
**Motivation**

## Next Steps 
#### Annotation Transfer


---
Remember to use tags! You can add multiple tags to any task.

![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) = done and ready for User Acceptance Testing (UAT)<br>
![uat-passed](https://img.shields.io/static/v1?label=UAT&message=passed&color=success) = tested and ready to merge with Master<br>
![deployed](https://img.shields.io/static/v1?label=&message=deployed&color=success) = merged with Master<br>
![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) = task deferred from one week to the next<br>
![help](https://img.shields.io/static/v1?label=&message=need_help&color=blue) = needs help from mentors<br>
![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange) = **blocked** task that needs discussion with mentors<br>
![stretch](https://img.shields.io/static/v1?label=&message=stretch&color=orange) = stretch goal <br>
![important](https://img.shields.io/static/v1?label=&message=important&color=red) = something that needs to be addressed immediately<br>


Use [Shields.io](https://shields.io) to creat new tags if needed.

