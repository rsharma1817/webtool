## Week 02 - (Jun 08 - Jun 14)

### Tasks scheduled for this week
- Train the classifier to identify semantic frames with the combined train and test dataset fromhttps://github.com/andersjo/any-language-frames ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) ![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow)
- Apply the parser built in Week 1 on the PT, DE, SE, and EL sentences. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Implement the proposed modification 1 ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Implement the proposed modification 2. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)
- Use the modified parser to perform semantic frames projections. ![completed](https://img.shields.io/static/v1?label=&message=completed&color=green)


### Challenges and solutions
1. Some annotations are duplicates. ![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange)`
```
<sentence ID="1157">
	<text>There's something curious about professors in my experience -- not all of them, but typically, they live in their heads.</text>
	<annotationSet ID="9935" frameID="437" frameName="Existence" luID="21981" luName="there be.v">
		<layer name="fe">
			<label ID="3193" end="41" name="Entity" start="8"/>
			<label ID="3193" end="41" name="Entity" start="8"/>
			<label ID="4362" end="58" name="Place" start="43"/>
			<label ID="4362" end="58" name="Place" start="43"/>
		</layer>
		<layer name="target">
			<label ID="1" end="6" name="Target" start="1"/>
			<label ID="1" end="6" name="Target" start="1"/>
		</layer>
	</annotationSet>
</sentence>
```

2. Some annotations are incorrect. ![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange)`
```
1137 1 4 here "There isn't an education system on the planet that teaches dance every day to children the way we teach them mathematics."
1157 1 6 here's "There's something curious about professors in my experience -- not all of them, but typically, they live in their heads."
1206 1 6 here's "There's a raft of research, but I know it from my personal life."
1265 1 4 here "There was a wonderful quote by Jonas Salk, who said, 'If all the insects were to disappear from the Earth, within 50 years all life on Earth would end."
1295 1 5 ragen "Fragen Sie sie nach ihrer Schulbildung, nageln sie Sie an die Wand."
741 1 1 a "Na verdade, estou indo embora."
834 1 1 a "Na verdade, nós moramos numa cidade chamada Snitterfield, na periferia de Stratford, que foi onde o pai do Shakespeare nasceu."
975 1 1 o "No final o médico sentou ao lado da Gillian e disse: 'Gillian, eu ouvi todas as coisas que sua mãe me disse, e eu preciso conversar a sós com ela.'"
```

3. Some annotations cannot be tokenized properly. (no spacing between the period and the word) ![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange)`
```
847 46 52 Ninguém "'Larga esse lápis.E para de falar desse jeito.Ninguém entende nada.'"
847 18 18 E "'Larga esse lápis.E para de falar desse jeito.Ninguém entende nada.'"
976 37 39 Não "Ele disse: 'Espere aqui, já voltamos.Não vai demorar.',e eles deixaram ela sozinha."
980 129 132 Leve "Eles observaram por alguns minutos e ele se virou para a mãe e disse: 'Sra.Lynne, a Gillian não está doente, ela é uma dançarina.Leve-a para uma escola de dança.'"
999 151 152 Se "Existe uma frase maravilhosa de Jonas Salk, que diz: 'Se todos os insetos desaparecessem da terra, dentro de 50 anos, toda vida na Terra desapareceria.Se todos os humanos desaparecessem da Terra, dentro de 50 anos todas as formas de vida floresceriam.'"
```

### Tasks postponed to next week

None :sunglasses:

### Deliverables

#### LU Identification (without modification)
Filename: `{lang}_ID_to_LUs.pkl`

`sent_ID -> (word, lemma, start_pos, pos) -> {framenet_lus.ID}}`

```
1274: defaultdict(set, {('Thank', 'thank', 0, 'VERB'): {8945, 8946}, 
			('very', 'very', 10, 'ADV'): {174, 911, 3067, 7444, 10309, 11665, 14102, 14110, 14218, 14745, 15715, 16470}})})
```

#### LU Identification (with Modification 1)
Filename: `{source_lang}_{target_lang}_{n-gram}_ID_to_LUs.pkl`

`(source_sent_ID, target_sent_ID, source_LU, source_embedding) -> (potential LU, embedding)`

```
(1076, 1336, 'said', tensor([-0.7068, -0.3851, -0.8780,  ...,  0.3474,  1.4252, -0.7536])): ("falsch ? '", tensor([-0.6113,  0.2115, -0.1122,  ...,  0.8754,  0.6139,  0.1818]))
```

#### Frame Identification (without modification)
Filename: `{lang}_ID_to_frames.pkl`

`sent_ID -> [(word, frame)]`

```
1268: [('gift', 'Kinship'), ('human', 'Information')],
1269: [('use', 'Being_named'), ('avert', 'Desirability'), ('talked', 'Collaboration'), ('to', 'Cardinal_numbers'), ('have', 'Calendric_unit')],
```


#### Frame Identification (with Modification 2)
Filename: `{source_lang}_{target_lang}_ID_to_frames.pkl`

`(source_sent_ID, target_sent_ID) -> {(target_LU, source_frame, pred_frame)}`

```
(1334, 1074): {('happened', 'Event', 'Event'), ('happened', 'Likelihood', 'Likelihood')},
(1337, 1077): {('switched', 'Exchange', 'Replacing'), ('switched', 'Performers_and_roles', 'Performers_and_roles')}})
```

---
Remember to use tags! You can add multiple tags to any task.

![completed](https://img.shields.io/static/v1?label=&message=completed&color=green) = done and ready for User Acceptance Testing (UAT)<br>
![uat-passed](https://img.shields.io/static/v1?label=UAT&message=passed&color=success) = tested and ready to merge with Master<br>
![deployed](https://img.shields.io/static/v1?label=&message=deployed&color=success) = merged with Master<br>
![carryover](https://img.shields.io/static/v1?label=&message=carryover&color=yellow) = task deferred from one week to the next<br>
![help](https://img.shields.io/static/v1?label=&message=need_help&color=blue) = needs help from mentors<br>
![definition](https://img.shields.io/static/v1?label=&message=needs_definition&color=orange) = **blocked** task that needs discussion with mentors<br>
![important](https://img.shields.io/static/v1?label=&message=important&color=red) = something that needs to be addressed immediately<br>

Use [Shields.io](https://shields.io) to creat new tags if needed.

