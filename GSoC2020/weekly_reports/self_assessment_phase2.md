# Self Assessment: GSoC 2020 Phase 2

This writing documents my assessment of what I did and how I felt about my work. This phase has been particularly challenging yet fulfilling. 

## Proposed Work and Changes
In the first two weeks (week 5 and week 6) my progress was relatively slow because I could not implement the any-language frame-semantics parser. First, it was unclear how the argument identification part of the parser received inputs such as the dependency path, the head word of s that has lemma λ, lemma λ is realized in some word in s, the voice denoted in the span, etc. Second, it was also unclear how the dependency parser from TurboParser was trained since the pre-trained parsers for languages such as Spanish and Bulgarian were not provided. Moreover, some of the links, such as the link to datasets, on the page of TurboParser were broken. In the end, I realized that even if I successfully implemented the parser in the coming two weeks, I failed to achieve this project's objective: annotation projection. Therefore, I moved on to analyzing different levels of alignment for annotation transfer and communicated my intent to the mentors.

I struggled at the beginning at obtaining the constituents, which led me to open [many](https://github.com/nikitakit/self-attentive-parser/issues/64) [GitHub](https://github.com/stanfordnlp/stanza/issues/384) [issues](https://github.com/cgl/portuguese-nlp/issues/3). Eventually, I managed to parse English and German sentences (and currently working on parsing Portuguese sentences).
I originally proposed to evaluate constituent-to-constituent alignment, but during this phase, I went beyond my proposal and evaluated word-to-word, constituent-to-word, and constituent-to-constituent alignments (see [results](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/week_07.md)).

## Learning from Phase 1 Mentors' Feedback

I also learned from the constructive feedback from Phase 1, which was to provide more docstrings and explain my codes better. For the submitted codes (in the folder `https://github.com/FrameNetBrasil/webtool/tree/gsoc2020_1/week5-8_codes`), I provided the high-level explanations for many cells in the Jupyter notebooks and documented the input parameters and the outputs of a function. I also commented on the algorithms, such as the purpose of the if-else conditions.

## Stretch Tasks
First, I wrote a short blog post about the preliminary results that we have gotten for Phase 1 and Phase 2. 
Second, I performed many preliminary research experiments to evaluate the use of the state-of-the-art language models, such as pre-trained embeddings, cross-lingual token classification model (XLM-R), and the sequence-to-sequence transformer model (T5), for our frame-semantics project:
- LU Identification with XLM-R: https://beta.deepnote.com/project/b96da6bc-efec-4453-90ba-d55bb9909bdb
- Annotation Transfer with T5: https://beta.deepnote.com/project/a2fcd2ca-cfcc-4dda-98af-de3058f67feb
- Assessing Pre-trained Embeddings as a Distributional Frame Semantics Language Model: https://beta.deepnote.com/project/36b64a95-aa83-4e74-81bf-f4005b912ab0

(Note: because the preliminary results using the training data had been [disappointing](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/week_08.md), I chose to spend time exploring other possible methods to apply for our task instead of commenting on the codes in a detailed manner.)
