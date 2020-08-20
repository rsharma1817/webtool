# Deliverables for Google Summer of Code 2020
**Organization**: FrameNet Brasil

**Project Category**: Multilingual Semantic Annotation Projection

**Project Title**: Multilingual Projections of Semantic Frames and Frame Elements using Modified Existing Parsers and Neural Networks

---
### Annotation Projection of Lexical Units

The incompleteness of the Extended Open Multilingual Wordnet leads to many false negatives. For example, the Portuguese word "educacional" does not exist in  the multilingual WordNet; therefore, it cannot be translated into the English LU "educational.a". False negatives can also come from the heuristic of choosing the K most common parts-of-speech tags. For English and German, numerals and adjectives are filtered out, whereas for Portuguese, determiners and subordinating conjunctions are filtered out. The false positives are primarily stopwords that exist in Berkeley FrameNet 1.7 but are not annotated in the TED Talk Corpus. 

The pre-trained multilingual-BERT language models performed comparably to the parser. It's known that the BERT embeddings do not fully respect cross-sentence coherence: the same word form with the same meaning are represented differently for occurrences in different sentences in the same language. In our case, the linguistic differences across languages such as conflational divergences in the sentence exacerbate the issue. For example, for the pair of EN-PT sentences ("No **idea** how this may play out.", "Nenhuma **idéia** do que nos espera.") where the bold words are the frame-evoking words, the model fails to align "idéia.n" with "idea.n" using the word-level cosine similarity measure. However, we can reduce the disparity in the distributional semantics by minimizing the vector differences between aligned words in two different languages when training BERT language models. As a result, we reduce false negatives and boost the F1-score of LU projection from Portuguese sentences to English sentences by 7%. The limination is that the trained BERT model is bilingual as it is trained with a bilingual alignment objective. In other words, it cannot be readily used for annotation projection in a low-resource setting.


---
### Python Package `globalfn` ![stretch](https://img.shields.io/static/v1?label=task&message=stretch&color=orange)
#### Descriptions
A Python package that retrieves the transcript text of TED Talk Corpus, their gold frame-semantics annotations, and the gold alignments of sentences across languages. The documentation can be found on the [README of the package](https://github.com/FrameNetBrasil/webtool/tree/gsoc2020_1/globalfn). 

#### Demo
![Demo](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/assets/demo_globalfn_final.gif)


### Automated Sentence Alignments ![stretch](https://img.shields.io/static/v1?label=task&message=stretch&color=orange)
#### Descriptions
Currently, the sentence alignments of TED Talk transcripts for EN-JP, EN-FR, EN-UR, and EN-HI are missing, and the alignment for EN-DE is incomplete. I used the [`vecalign`](https://github.com/thompsonb/vecalign) model from the paper "Vecalign: Improved Sentence Alignment in Linear Time and Space" (Thompson & Koehn, 2019) to create the alignments. 

#### Results
Result can be found on the Google Sheet: [TED Corpus Sentence Alignment GSoC (vecalign)](https://docs.google.com/spreadsheets/d/1wfT2JBH-ePHxi2GHJU7w1U7xnHn9Ng8eLi09uyoAVws/edit)

![Result](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/assets/result_vecalign.png)
