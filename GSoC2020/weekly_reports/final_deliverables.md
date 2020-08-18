# Deliverables for Google Summer of Code 2020
**Organization**: FrameNet Brasil

**Project Category**: Multilingual Semantic Annotation Projection

**Project Title**: Multilingual Projections of Semantic Frames and Frame Elements using Modified Existing Parsers and Neural Networks


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
