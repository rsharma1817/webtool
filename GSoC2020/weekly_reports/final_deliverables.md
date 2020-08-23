# Final Deliverables for Google Summer of Code 2020
**Organization**: FrameNet Brasil

**Project Category**: Multilingual Semantic Annotation Projection

**Project Title**: Multilingual Projections of Semantic Frames and Frame Elements using Modified Existing Parsers and Neural Networks

---
## Discussion
### Annotation Projection of Lexical Units

The Any-language Frame-Semantics Parser leads to many false negatives due to the Extended Open Multilingual Wordnet’s incompleteness. For example, the Portuguese word “educacional” does not exist in the multilingual WordNet; therefore, it cannot be translated into the English LU “educational.a”. False negatives can also come from the heuristic of choosing the K most common parts-of-speech tags. For English and German, numerals and adjectives are filtered out, whereas for Portuguese, determiners and subordinating conjunctions are filtered out. The false positives are primarily stopwords that exist in Berkeley FrameNet 1.7 but are not annotated in the TED Talk Corpus.

The pre-trained multilingual-BERT language models performed comparably to the parser. It’s known that the BERT embeddings do not fully respect cross-sentence coherence: the same word form with the same meaning are represented differently for occurrences in different sentences in English. In our case, the linguistic differences across languages, such as conflational divergences, in the sentence exacerbate the issue. For example, for the pair of EN-PT sentences (“No **idea** how this may play out.“, “Nenhuma **idéia** do que nos espera.“) where the bold words are the frame-evoking words, the model fails to align “idéia.n” with “idea.n” using the word-level cosine similarity measure.

However, we can reduce the disparity in the distributional semantics by minimizing the vector differences between aligned words in two different languages when training BERT language models (i.e., Arthur’s language model). As a result, we reduce false negatives and boost the F1-score of LU projection from Portuguese sentences to English sentences by 7%. The limitation is that the trained BERT model is bilingual as it is trained with a bilingual alignment objective. In other words, unlike the pretrained multilingual-BERT, Arthur’s language model, which is overfitted to two languages, cannot be readily generalized to annotation projection in a low-resource setting.

### Annotation Projection of Semantic Frames

Only 5.3% of the EN-PT aligned sentences and 4.2% of EN-DE have the exact same set of frames annotations. The predominant reason is that some words in a language are not annotated as frame-evoking lexical units. For example, the sentence "Don't you?" are not annotated with any semantic frame, but its Portuguese counterpart "Vocês não?" is annotated with the *Negation* frame for the word "não". Particularly, 86% of the EN-PT alignment pairs and 81% of the EN-DE alignment pairs differ in the number of annotated LUs and frames.

We can study the divergence of annotated semantic frames by aligning words in the sentence pairs. Through the `fast_align` model, we align the annotated lexical units if such word alignment is possible, and we find that a surprisingly low proportion of annotated semantic frames are identical: 30.7% for the EN-DE pairs and 31.2% for the EN-PT pairs. However, the figures may be misleadingly low because word alignment model is not 100% accurate. For example, the word alignment model mistakenly aligns the English phrase "three themes" with the Portuguese word "tópicos". 

Even when the lexical units are correctly aligned, translational divergences such as lexical divergence may cause frame divergence. For example, in the EN-DE sentence pair "No idea how this may **play out** ." and "Keine Ahnung , wie das **enden** wird .", where the frame-evoking word "play out" is lexically realized as "end" (English for "enden") in the German sentence, the lexical units evoke *Turning_out* and *Process_end* frames respectively. First, note that the two frames are distant from each other – they are three frames apart (i.e., *Process_End - Event - Coming_to_believe - Turning_out*), and they differ in specificity: the frame *Process_end* describes an ending event, whereas the frame *Turning_out* merely describes how an event becomes the reality in someone's knowledge of the world. Second, interpretation of the participants in the frame differs. Under the frame *Turning_out*, the phrase "how this" is labelled as the core frame element *State_of_affairs*. On the other hand, under the frame *Process_End* that describes a *Process* coming to an end, the word "das" (this) is treated as the core frame element *Process*, and the word "wie" (how) is labelled as the non-core frame element *Manner*. In other words, "how" (i.e., the manner of the event occurs) is considered as the necessary component of the state of affairs but is categorized as a peripheral semantic role that merely provides additional information about how the process ends. 

To induce frames in an unannotated sentence, the neural-based frame classifier that embeds semantic frames through deep embedded clustering performs better than a simple multinomial log-classifier. We can achieve the best performance by restricting the frame search space around the frames in the parallel annotation. Nonetheless, all the studied methods underperforms with their F1-scores lower than 50%. While the assumption that semantic frames can be directly transferred holds true, there is no simple heuristics, including the use of frame-to-frame relations, for predicting frame divergence. Diverged frames for the same lexical unit in different languages can be several frames apart.


### Annotation Projection of Frame Elements

Assuming that semantic frame can be successfully projected (i.e., there's no divergence), can the frame elements can be projected as well? When the sentence pairs are annotated with the same semantic frame, only 32.7% of the annotations of EN-PT pairs and 43.8% of EN-DE pairs share the same set of frame element labels, including core and non-core frame elements. The figures are the upper bound for the exact match ratio if we treat the annotation projection as a sequence labeling task using all the frame elements labels from the annotated parallel sentences. One reason is the translational divergence that takes place. For example, the word "I'm leaving" is syntactically realized as "ich gehe jetzt" (I leave now). The adverbial phrase "jetzt", introduced to indicate the present continuous tense, does not exist in the English sentence and is labelled as the non-core frame element *Time* for the frame *Departing*.

If we only look at the projection of core frame elements, when the sentence pairs share the same semantic frame, 40.7% of the annotations of EN-PT pairs and 51.8% of EN-DE pairs share the same set of core frame element labels. Translational divergence is not the sufficient cause for the discrepancies as it seems like corpus linguists have different interpretations of the semantic roles. For example, for this EN-PT sentence pair "And our job is to help them make something of it ." and "E o nosso trabalho é ajudá-las a tirar proveito dele .", the phrase "a tirar proveito dele" that corresponds to the phrase "make something of it" is not labelled with the frame element *Goal* under the frame *Assistance*. Since we only have one annotation set for each language, we cannot calculate the interannotator agreement score.


---
## Resources for Future Research
### 1. Python Package `globalfn` ![stretch](https://img.shields.io/static/v1?label=task&message=stretch&color=orange)
#### Descriptions
A Python package that retrieves the transcript text of TED Talk Corpus, their gold frame-semantics annotations, and the gold alignments of sentences across languages. The documentation can be found on the [README of the package](https://github.com/FrameNetBrasil/webtool/tree/gsoc2020_1/globalfn). 

#### Demo
![Demo](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/assets/demo_globalfn_final.gif)

### 2. Frame Divergence of Lexical Units ![main](https://img.shields.io/static/v1?label=task&message=main&color=green)
#### Descriptions
Each document contains the information of aligned pairs of frame-evoking words and their annotated semantic frames for a bilingual sentence pair. The lexical units are aligned with fast_align (Dyer, Chahuneau, & Smith, 2013). The purpose is to study the frame divergence of the aligned lexical units.

#### Results
Results can be found on the folder: https://github.com/FrameNetBrasil/webtool/tree/gsoc2020_1/frame_divergences

![Result](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/assets/result_frame_divergence.png)

### 3. Automated Sentence Alignments ![stretch](https://img.shields.io/static/v1?label=task&message=stretch&color=orange)
#### Descriptions
Currently, the sentence alignments of TED Talk transcripts for EN-JP, EN-FR, EN-UR, and EN-HI are missing, and the alignment for EN-DE is incomplete. I used the [`vecalign`](https://github.com/thompsonb/vecalign) model from the paper "Vecalign: Improved Sentence Alignment in Linear Time and Space" (Thompson & Koehn, 2019) to create the alignments. 

#### Results
Result can be found on the Google Sheet: [TED Corpus Sentence Alignment GSoC (vecalign)](https://docs.google.com/spreadsheets/d/1W7tPyE2kiAziFOw-woaYzlDlC5aCc1jco-5VkAtEtCs/edit#gid=898901472)

![Result](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/assets/result_vecalign.png)



---

#### Codes
- https://github.com/FrameNetBrasil/webtool/tree/gsoc2020_1/week1-4_codes
- LU_projection.ipynb notebook: https://deepnote.com/project/9180a10b-0c75-4478-b383-eedfccbf67fd
