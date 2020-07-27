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
- I should try out other word-alignment models since I have only used `fast_align`, which is a model that reparameterizes IBM GIZA++ Model 2 for replacing IBM Model 4.
  1. I attempted to implement **IBM GIZA++ latest version (Model 5)** using the `nltk.align` package but it relies on classifying the words into 50 classes before parsing. The code for classification is [here](http://www.fjoch.com/mkcls.html) but I run into ImplementationError when I used the provided files. I will continue implementing GIZA++ Model 5 for the alignment task.
  2. I found a recently published [paper](https://arxiv.org/abs/2004.14675) (Zenkel et al., 2020) on an end-to-end neural model that outperforms GIZA++ but no code is provided.
- Arthur has pre-trained a language model which is fine-tuned for FrameNet. I should look into representing words using Arthur's model instead of using pre-trained language models.
- I need to explain the result obtained thus far (such as the interpretation of the hamming-loss, etc.)
- It makes sense that the constituent-to-word alignment performs better than the constituent-to-constituent alignment.
- Annotation transfer through the alignment of dependency trees is not reliable for Portuguese sentences.
- I can use Sketch-Engine to obtain the constituents of Portuguese sentences.
- It's worth exploring methods that improve the annotation transfer to DE (since the [training dataset](https://github.com/andersjo/any-language-frames) includes DE data) and enable few-shot/zero-shot annotation transfer to PT (since the [training dataset](https://github.com/andersjo/any-language-frames) does not include PT data)
  1. **Research Idea 3**: I found a recently published paper "Cross-Lingual Semantic Role Labeling with High-Quality Translated Training Corpus"
 (in ACL 2020) that performs translation-based projection. They also provide their [implementation](https://github.com/scofield7419/XSRL-ACL/tree/master/Projection) on GitHub. 
  2. **Research Idea 4**: Create representations for frames and frame elements (fine-grained semantic role labels) through average pooling and use a neural network to identify two things for the target sentence: (1) does the target sentence evoke the frame and contain the frame elements projected from the source sentence? (2) if so, which words in the target sentence are the lexical units and frame elements?

## Research Experimental Results

### Idea 1: Multilingual Frame-Semantics Parser -> Correct the Labels with Annnotated Parallel Corpora
**Model**: XLM-RoBERTa (XLM-R) with token classification
- Rationale: XLM-R outperforms mBERT on cross-lingual transfer tasks (Conneau et al., 2019)

**Preliminary Results**: It performs worse than the any-language frame-semantics parser for LU identification (which is a task of classifying word tokens into two labels) regardless of whether XLM-R is trained with the data in the particular language or combined data across all languages. Table below shows the comparison of XLM-R with the baseline model on F1-scores. ![definition](https://img.shields.io/static/v1?label=result&message=disappointing&color=orange)

| Models | BG | DA | DE | EL | EN | ES | FR | IT | SV |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| Johannsen et al. (2015) | 85.5 | 73.6 | 58.4 | 52.9 | 80.2 | 89.1 | 66.1 | 69.0 | 72.8 |
| XLM-R trained on monolingual data |  64.6 | 56.9 | 53.5 | 47.8 | 70.6 | 60.4 | 60.4 | 50.1 | 53.2 |
| XLM-R trained on combined data  |  59.9 | 59.7 | 54.2 | 16.1 | 73.0 | 59.4 | 51.8 | 51.7 | 60.5 |

**Discussion**: XLM-R with a simple linear layer on top for classifying token is not sufficient for identifying LUs, let alone labeling frame elements. Since the GSoC task here is to project annotations, I should not focus on fine-tuning the parser - instead, I should move on to the second part – correcting the labels – since label correction can be applied to even alignment-based projection models.

### Idea 2: Application of T5
**Model**: T5 (Text-to-text transfer transformer)
- Rationale: Annotation projection is essentially a sequence-to-sequence labeling task with the inductive bias of existing annotations.

**Preliminary Results and Discussion**: Due to the lack of training data, T5 does not learn to label sequences as intended; instead, it outputs the mask token instead of the label. After experimenting various size of training dataset using IMDB sentiment prediction, I learned that T5 requires at least hundreds of sentences to train. In other words, the pre-trained T5 model existing on HuggingFace is not capable for our low-resource annotation projection task.

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

