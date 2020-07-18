## Week 07 - (Jul 13 - Jul 19)

### Tasks scheduled for this week
- Updated `globalfn` library with more comprehensive documentation (such as the output example) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Updated the `Annotation` class in `globalfn` library with tokenized text, LUs, frames, FEs, which make word-to-word annotation transfer simpler ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Created the [error.log](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/globalfn/_extractions/error.log) file that shows the tokenized annotation errors due to annotation errors existing in the webtool database ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
---
- Create word alignments across parallel sentences in the Global FrameNet using the `fast_align` library (see Chris Dyer, Victor Chahuneau, and Noah A. Smith. (2013). A Simple, Fast, and Effective Reparameterization of IBM Model 2. In Proc. of NAACL.) ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Transfer frame elements based on the word alignments from a source sentence to a target sentence. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Transfer frame elements based on the constituency-to-word alignment from English source sentences to target sentences. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Evaluate the frame elements labeling using metrics such as the hamming loss and its break-down, exact match ratio, and the distribution of the Matching Number of FEs ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)

---
Open the following issues in the open-source libraries: ![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange)
- AllenNLP Constituency Parsing: https://github.com/allenai/allennlp/issues/4493
- Berkeley Neural Parser for Parsing German sentences: https://github.com/nikitakit/self-attentive-parser/issues/64

### Challenges and solutions
#### 1. Choice of Evaluation Metrics

Microaverage and macroaverage of F1 scores are not really feasible for this multilabel tasks of frame elements because the frame element labels are too granular: we have to compute the precision and recall for each frame element label under each frame (i.e., the frame-frame element pair). This leads to many classes having at most 1 data points.

**Solution**: Calculate the hard, soft, total hamming loss, and the exact matching ratio. 

#### 2. Constituents-to-constituents Alignment
Here are the constituency parsing models I've attempted so far:
- [Berkeley Neural Parser](https://github.com/nikitakit/self-attentive-parser):
    - Parsing a single German sentence requires more than 12GB Nvidia T4 GPU RAM. See issue: https://github.com/nikitakit/self-attentive-parser/issues/64
    - The language support does not include Portuguese.
- [AllenNLP](https://github.com/allenai/allennlp)
    - Only supports the constituency parsing of English sentences. See issue: https://github.com/allenai/allennlp/issues/4493
- [OpeNER](http://opener.olery.com/constituent-parser) for parsing German sentences
    - Web services are not available for verifying the usage.
    - On the [repo](https://github.com/opener-project/constituent-parser), it is unclear how the readily available KAF file is generated for constituency parsing. Particularly, the authors did not mention how to generate the text-layer fragment of a KAF file from a sentence. See issue: https://github.com/opener-project/VU-kaf-parser/issues/1 
- [LXParser](http://lxcenter.di.fc.ul.pt/tools/en/LXParserEN.html) (based on LXTokenizer and Stanford Parser) for parsing Portuguese sentences
    - I ran into the error of not able to execute the binary file when I followed the instructions on https://github.com/cgl/portuguese-nlp/blob/master/docs/parse.md. See issue: https://github.com/cgl/portuguese-nlp/issues/3

- [FreeLing]

**Solution**:


### Tasks completed

....

### Tasks postponed to next week

...
...

### Observations

...
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

