<?php

return array
(
	array
	(
		'Основные понятия', // 1.
		array
		(
			'В игре принимают участие десять человек. Игроки случайным образом делятся на две команды: «красные» (мирные жители) и «чёрные» (мафия). В игре разыгрываются 7 «красных» карт, одна из которых Шериф, и 3 «чёрные», одна из которых Дон.', // 1.1.
			'Игра имеет две фазы: фаза «день» и фаза «ночь».', // 1.2.
			'Ведёт игру, регламентирует ее начало, конец и все игровые фазы, Судья. Ведению игры могут помогать боковые Судьи.', // 1.3.
			'Победа команды «красных» наступает в тот момент, когда из игры выведены все представители «чёрной» команды. Победа «чёрной» команды наступает в случае, когда за игровым столом остается равное количество игроков обеих команд или количество «черных» игроков больше, чем «красных». Моментом вывода игрока является момент голосования или ночного убийства.', // 1.4.
			'Если в течение 3 «ночей» и «дней», следующих подряд друг за другом, начиная с «ночи», никто из игроков не покидает игру, объявляется ничья.', // 1.5.
			array // 1.6.
			(
				RULES_NO_KILL_ON_FOUR,
				'Три круга нет убийств при четверых',
				array
				(
					'Если никто не покидает стол в течение 3 «ночей» и «дней» подряд при четырех игроках за столом, то победа присуждается «красной» команде.',
					'Если никто не покидает стол в течение 3 «ночей» и «дней» подряд при четырех игроках за столом, то как и в любой другой день объявляется ничья.',
				),
				array
				(
					'Победа красных.',
					'Ничья.',
				),
			),
		),
	),

	array
	(
		'Игровая площадка, инвентарь и официальный язык игры.', // 2.
		array
		(
			'Игровой стол должен быть таким, чтобы за ним комфортно разместились 10 игроков. Судья имеет право разместиться за игровым столом или рядом с игровым столом так, чтобы иметь возможность видеть и слышать всё, что происходит за игровым столом.', // 2.1
			'У каждого игрового бокса должна быть табличка с номером и игровая маска для игрока.', // 2.2.
			'Игровая площадка должна быть обеспечена акустикой или иным музыкальным оборудованием для проведения игровой «ночи».', // 2.3.
			'Официальными языками игры являются русский и английский. Национальные турниры, на которых нет иностранных участников, могут проводиться на национальном языке.', // 2.4.
		),
	),

	array
	(
		'Игроки.', // 3.
		array
		(
			'Игрок находится на игровой площадке до тех пор, пока принимает участие в игровом процессе.', // 3.1.
			'Игрок имеет право использовать любую экипировку, кроме той, которая создает опасность для других игроков, оскорбляет других игроков или любыми способами дает незаслуженное преимущество над другими игроками.', // 3.2.
		),
	),

	array
	(
		'Начало игры', // 4.
		array
		(
			'За игровой стол приглашаются десять игроков.', // 4.1.
			'Место за игровым столом разыгрывается случайным образом в порядке определенном организаторами турнира, либо заранее указано в расписании турнира.', // 4.2.
			'Судья представляет игроков и объявляет начало игры фразой «наступает ночь». Все игроки надевают игровые маски.', // 4.3.
			'Игроки по очереди с закрытыми глазами выбирают игровую карту, снимают маску, знакомятся с игровой ролью и надевают маску.', // 4.4.
			array // 4.5.
			(
				RULES_NIGHT_POSE,
				'Ночная поза игрока',
				array
				(
					'Запрещено петь, танцевать, говорить. Запрещено касаться руками маски. Запрещено касаться других игроков любыми частями тела. Игроки сидят скрестив руки на груди, наклонив голову под углом примерно 45 градусов. В случае, когда музыка слишком тихая и ее нельзя сделать громче, позволяется поза в которой игроки сидят заткнув руками уши.',
					'Запрещено петь, танцевать, говорить. Запрещено касаться руками маски. Запрещено касаться других игроков любыми частями тела. Игроки сидят положив обе руки на стол, наклонив голову под углом примерно 45 градусов.',
					'Запрещено петь, танцевать, говорить. Запрещено касаться руками маски. Запрещено касаться других игроков любыми частями тела. В остальном игроки могут сидеть так, как им удобно.',
				),
				array
				(
					'Скрестив руки на груди.',
					'Руки на столе.',
					'Как угодно.',
				),
			),
		),
	),

	array
	(
		'Стартовая игровая «ночь».', // 5.
		array
		(
			'Договоренка мафии. Судья объявляет: «Просыпается мафия». Игроки, получившие «черные» карты, снимают маски, знакомятся друг с другом. Это единственная ночь, когда «чёрные» игроки открывают глаза вместе. Дон жестом показывает, что он является Доном, и назначает порядок «отстрела» на последующие «ночи». На это у «чёрной» команды есть ровно 1 минута. По окончании минуты Судья объявляет: «Мафия засыпает». После этих слов «черные» игроки надевают маски. Судье рекомендуется ждать полную минуту даже если мафия договорилась быстрее. Чтобы игроки не могли делать выводы о составе мафии по тому сколько длилась договоренка.', // 5.1
			'Знакомство с Доном. Судья объявляет: «Просыпается Дон». Дон снимает маску и показывает ведущему, что он Дон. Дон может осмотреть игроков. На это он имеет не более 10 секунд. Дон имеет право не снимать маску, а просто обозначить себя жестом.', // 5.2.
			'Знакомство с Шерифом. Судья объявляет: «Просыпается Шериф». Шериф снимает маску и показывает ведущему, что он Шериф. Шериф может осмотреть игроков. На это он имеет не более 10 секунд. Шериф имеет право не снимать маску, а просто обозначить себя жестом.', // 5.3.
			array // 5.4.
			(
				RULES_NIGHT_SEQ,
				'Последовательность событий в первую ночь',
				array
				(
					'Последовательность событий в первую ночь следующая: Знакомство с Доном (5.2); затем Договоренка мафии (5.1); затем Знакомство с Шерифом (5.3).',
					'Последовательность событий в первую ночь следующая: Договоренка мафии (5.1); затем Знакомство с Доном (5.2с); затем Знакомство с Шерифом (5.3).',
					'В первую ночь проводится только Договоренка мафии (5.1) Знакомство с Доном и Шерифом не производится.',
				),
				array
				(
					'Знакомство с доном, потом договоренка мафии, потом шерифом.',
					'Договоренка мафии, потом знакомство с доном, потом Знакомство с шерифом.',
					'Договоренка мафии, а знакомства не производятся.',
				),
			),
			'После всего Судья объявляет: «День. Все просыпаются».', // 5.5.
		),
	),

	array
	(
		'Игровой «день».', // 6.
		array
		(
			'Игроки снимают маски. В фазу дня происходит обсуждение. В каждый игровой день игроку дается 1 мин.', // 6.1.
			'Игроки высказываются по очереди в порядке рассадки за игровым столом. Обсуждение первого игрового дня начинает игрок под номером 1.', // 6.2.
			array // 6.3.
			(
				RULES_ROTATION,
				'Ротация первой речи',
				array
				(
					'Обсуждение каждого последующего игрового дня начинается со следующего после говорившего первым на предыдущем кругу игрока. Если следующий игрок убит, слово передается следующему игроку. Например, если в первый день стол открывал игрок номер 1, а закрывал номер 10, то во второй день стол откроет игрок номер 2 (следующий за номером 1), а закроет номер 1. Если же игрок номер 1 убит ночью, стол по прежнему открывает игрок номер 2 (следующий за номером 1), а закрывает номер 10.',
					'Обсуждение начинается с игрока под таким номером, чтобы последний поговоривший был следующим по сравнению с последним поговорившим прошлым днем. Если следующий по сравнению с последним поговорившим игрок убит, то стол должен закрывать следующий по номеру игрок. Например, если в первый день стол открывал игрок номер 1, а закрывал номер 10, то во второй день стол откроет игрок номер 2, а закроет номер 1 (следующий за номером 10). Если же игрок номер 1 убит ночью, стол открывает игрок номер 3, а закрывает номер 2 (следующий живой игрок после номера 10).',
				),
				array
				(
					'Ротация открывающего стол.',
					'Ротация закрывающего стол.',
				),
			),
			'Игрок имеет право обращаться к другим игрокам по игровому никнейму или порядковому номеру игрока.', // 6.4.
			'Игрок имеет право обращаться к Судье фразой «Господин (-жа) Судья» или «Господин (-жа) Ведущий (-ая)».', // 6.5.
			'Игроки заканчивают свое выступление словом «Пас» или «Спасибо».', // 6.6.
		),
	),

	array
	(
		'Голосование.', // 7.
		array
		(
			'По окончании «дневного» обсуждения происходит голосование. Голосование проводится только среди игроков, выставленных на голосование во время «дневного» обсуждения.', // 7.1.
			'Во время своей минуты игрок имеет право выставить любого игрока на голосование. Выставление игрока на голосование производится фразой в настоящем времени: «Я выставляю игрока № …» или «Примите кандидатуру игрока № …».', // 7.2.
			array // 7.3.
			(
				RULES_NOMINATION_THUMB,
				'Жесты при выставлении',
				array
				(
					'При выставлении игрока на голосование, игрок может поставить на стол руку с поднятым большим пальцем. Однако это не обязательно.',
					'При выставлении игрока на голосование, игрок должен поставить на стол руку с поднятым большим пальцем. Иначе выставление не принимается.',
				),
				array
				(
					'Руку на стол можно не ставить.',
					'Надо ставить руку на стол.',
				),
			),
			'В ответ Судья, если данная кандидатура принимается, произносит фразу: «Принято» либо «Принят номер …». Вторая форма обязательна при выставлении нескольких кандидатур, чтобы у стола была полная ясность, кто выставлен.', // 7.4.
			array // 7.5.
			(
				RULES_WITHDRAW,
				'Отзыв кандидатуры',
				array
				(
					'Во время своей минуты игрок имеет право отозвать выставленную им кандидатуру с голосования. Отзывание игрока с голосования производится фразой в настоящем времени: «Я отзываю игрока № ...». Если данная кандидатура отзывается Судья в ответ произносит фразу: «Отозвано». Отзывание игрока обязательно для выставления другого игрока. Пример:<blockquote><i>Игрок:</i> выставляю игрока 1.<br><i>Судья:</i> принято.<br><i>Игрок:</i> выставляю игрока 2, выставляю игрока 3, выставляю игрока 4.<br><i>(Судья молчит).</i><br><i>Игрок:</i> отзываю игрока номер 1.<br><i>Судья:</i> отозвано.<br><i>Игрок:</i> выставляю игрока 2, выставляю игрока 3, выставляю игрока 4.<br><i>Судья:</i> номер 3 принят.<br><i>(Это означает, что 2 уже выставлен другими игроками).</i></blockquote>',
					'Во время своей минуты игрок имеет право отозвать выставленную им кандидатуру с голосования. Отзывание игрока с голосования производится фразой в настоящем времени: «Я отзываю игрока № ...». Если данная кандидатура отзывается Судья в ответ произносит фразу: «Отозвано». Отзывание игрока не обязательно для выставления другого игрока. Оно происходит автоматически при следующем выставлении. Пример:<blockquote><i>Игрок:</i> выставляю игрока 1.<br><i>Судья:</i> принято.<br><i>Игрок:</i> выставляю игрока 2, выставляю игрока 3, выставляю игрока 4.<br><i>Судья:</i> номер 4 принят.<br><i>Игрок:</i> отзываю игрока номер 4.<br><i>Судья:</i> отозвано.<br><i>Игрок:</i> выставляю игрока 5, выставляю игрока 6, выставляю игрока 7.<br><i>Судья:</i> номер 6 принят.<br><i>(Это означает, что 7 уже выставлен другими игроками).</i></blockquote>',
					'Отозвать кандидатуру невозможно. Пример:<blockquote><i>Игрок:</i> выставляю игрока 5, 6, 7.<br><i>Судья:</i> номер 6 принят.<br><i>(Это означает, что 5 уже выставлен другими игроками).</i><br><i>Игрок:</i> выставляю игрока 2, 3, 4.<br><i>(Судья молчит).</i><br><i>Игрок:</i> отзываю игрока номер 6.<br><i>(Судья молчит).</i><br><i>Игрок:</i> выставляю игрока 3, 4, 5.<br><i>(Судья молчит).</i><br>Выставлен игрок номер 6.</blockquote>',
				),
				array
				(
					'Отозвать можно. Надо отзывать явно.',
					'Отозвать можно. Отзывается автоматически если выставить следующего.',
					'Отзывать нельзя.',
				),
			),
			'Игрок имеет право выставить на голосование только одну или ни одной кандидатуры в каждый игровой «день».', // 7.6.
			array // 7.7.
			(
				RULES_NOMINATION_QUESTION,
				'Вопрос к ведущему о выставлениях',
				array
				(
					'Игрок имеет право спросить у Судьи о выставленных на голосование игроках один раз во время своей речи.',
					'Игрок не имеет права получать у Судьи информацию о выставленных на голосование игроках.',
				),
				array
				(
					'Можно спросить один раз во время речи.',
					'Нельзя.',
				),
			),
			'Игроки голосуются в том порядке, в котором они были выставлены на голосование во время «дневного» обсуждения.', // 7.8.
			'Перед голосованием Судья должен озвучить выставленные кандидатуры в порядке выставления. Затем Судья для каждого выставленного игрока по очереди объявляет «Кто за то, чтобы игрок номер … покинул стол?». Игроки имеют право голосовать за озвученную кандидатуру до тех пор пока Судья не скажет «Стоп» или «Спасибо», после чего голоса не принимаются. Время на голосование - около 2-х секунд.', // 7.9.
			array // 7.10.
			(
				RULES_VOTING,
				'Постановка рук при голосовании',
				array
				(
					'Перед голосованием игроки должны убрать руки с игрового стола. Для того, чтобы проголосовать против того или иного игрока, игрок обязан после озвучивания кандидатуры незамедлительно поставить кулак с выставленным вверх большим пальцем на игровой стол.',
					'Перед голосованием игрок должен поставить локоть одной руки на стол. После озвучивания кандидатуры игрок должен незамедлительно поставить кулак с выставленным вверх большим пальцем на игровой стол.',
				),
				array
				(
					'Не касаясь стола.',
					'Локоть на столе.',
				),
			),
			'Игрок обязан держать руку на поверхности игрового стола до тех пор, пока Судья не объявит количество проголосовавших.', // 7.11.
			'Игрок имеет право голосовать только против одного кандидата во время голосования.', // 7.12.
			'Если игрок не проголосовал, то его голос отходит против игрока, выставленного на голосование последним.', // 7.13.
			'Если игрок отдернул руку при голосовании, то его голос засчитывается.', // 7.14.
			'Игрок, набравший большинство голосов на дневном голосовании, покидает игру.', // 7.15.
			array // 7.16.
			(
				RULES_FIRST_DAY_VOTING,
				'Голосование в первый «день»',
				array
				(
					'Если в первый игровой «день» выставлена только одна кандидатура, то голосование не проводится. В течение следующих «дней» голосуется любое количество выставленных на голосование игроков.',
					'Игрок победивший в голосовании в первый игровой «день» не покидает игру, а просто получает доподнительные 30 секунд, чтобы поговорить.',
				),
				array
				(
					'Если выставлен только один, то голосования нет.',
					'Голосование как обычно, но победитель не умирает, а только разговаривает 30 секунд.',
				),
			),
			'Если два или более игроков набирают одинаковое количество голосов на голосовании, то эти игроки получают дополнительные 30 секунд. Игроки говорят в порядке выставления на голосование. По истечении дополнительных 30-ти секунд происходит повторное голосование только между этими игроками и в том же порядке. Если голосование повторилось, то Судьёй ставится на голосование вопрос: «Кто за то, чтоб все голосуемые игроки покинули игровой стол?». Если большинство голосует за выбывание, игроки покидают игру. Если большинство игроков голосует против, либо голоса делятся поровну, то игроки остаются в игре.', // 7.17.
			'Если при повторном переголосовании два или более игроков вновь набрали равное число голосов, но количество победителей изменилось по сравнению с предыдущим голосованием, то проводится следующее переголосование. До тех пор пока один из игроков не победит в голосовании, либо два раза подряд будет получен одинаковый результат.', // 7.18.
			array // 7.19.
			(
				RULES_ALT_SPLIT,
				'Повторный распил другим составом',
				array
				(
					'Если при повторном голосовании победило то же количество игроков, что и в предыдущем, но они победили другими составами голосующих, то голосование считается повторившимся и ставится вопрос о том, чтобы все голосуемые игроки покинули стол.',
					'Если при повторном голосовании победило то же количество игроков, что и в предыдущем, но они победили другими составами голосующих, то считается, что результат голосования изменился и проводится еще одно переголосование. Однако если и в нем побеждает то же количество игроков но другими голосами, то следующее переголосование не проводится. Ставится вопрос о том, чтобы все голосуемые игроки покинули стол.',
				),
				array
				(
					'Засчитывается как повторный. Ставится вопрос, чтобы все покинули стол.',
					'Назначается третье переголосование.',
				),
			),
			array // 7.20.
			(
				RULES_KILL_ALL,
				'Распил и подъем всего стола',
				array
				(
					'Если в результате голосования, а затем и переголосования стол поделился между всеми игроками сидящими за столом, то объявляется ночь. Никто не покидает стол.',
					'Если в результате голосования, а затем и переголосования стол поделился между всеми игроками сидящими за столом, то ставится вопрос о том, чтобы все игроки покинули стол. Если большинство голосует за, игра останавливается и объявляется ничья.',
				),
				array
				(
					'Нельзя. Никто не умрет, игра продолжится.',
					'Можно. Если поднять всех, будет ничья.',
				),
			),
			array // 7.21.
			(
				RULES_SPLIT_ON_FOUR,
				'Подъем двоих при четверых',
				array
				(
					'Если за игровым столом находится четыре игрока и они дважды набирают одинаковое число голосов, дальнейшее происходит как в любом другом раунде. Судья спрашивает кто за то, чтобы оба игрока покинули стол и если больше 50% игроков голосуют за это, оба игрока покидают стол.',
					'Если за игровым столом находится четыре игрока и они дважды набирают одинаковое число голосов, дальнейшее голосование не проводится. Судья объявляет «Наступает ночь». Никто не покидает игровой стол.',
				),
				array
				(
					'Можно.',
					'Нельзя.',
				),
			),
			'Роль покинувшего игру игрока не раскрывается. Покинувший игру игрок имеет право на последнее слово продолжительностью в 1 минуту.', // 7.22.
		),
	),

	array
	(
		'Вторая и последующие «ночи».', // 8.
		array
		(
			'По окончании первого игрового «дня» Судья объявляет: «Наступает ночь». Все игроки незамедлительно надевают игровые маски.', // 8.1.
			'В течение этой и следующих «ночей» мафия имеет возможность «стрелять».', // 8.2.
			array // 8.3.
			(
				RULES_SHOOTING,
				'Ночная стрельба',
				array
				(
					'Судья объявляет: «Мафия выходит на охоту». Далее Судья объявляет номера игроков от 1 до 10.',
					'Судья объявляет: «Мафия выходит на охоту». Далее Судья объявляет по очереди в порядке возрастания только номера игроков сидящих за столом начиная с номера 1.',
				),
				array
				(
					'Объявляются все номера от 1 до 10.',
					'Объявляются только номера игроков сидящих за столом.',
				),
			),
			'Игроки «чёрной» команды «стреляют» с закрытыми глазами посредством имитации выстрела пальцами высоко поднятой руки.', // 8.4.
			'Если игроки «чёрной» команды «стреляют» в одного и того же игрока, то этот игрок по истечении «ночи» покидает игровой стол. Роль покинувшего игру игрока не раскрывается.', // 8.5.
			array // 8.6.
			(
				RULES_KILLED_NOMINATE,
				'Выставление убитым ночью игроком',
				array
				(
					'Покинувший игру игрок имеет право на последнее слово продолжительностью в 1 минуту. Эта минута предоставляется ему в самом начале следующего дня. В эту минуту игрок не имеет права выставлять других игроков на голосование.',
					'Покинувший игру игрок имеет право на последнее слово продолжительностью в 1 минуту. Эта минута предоставляется ему в самом начале следующего дня. В эту минуту игрок имеет право выставлять других игроков на голосование.',
				),
				array
				(
					'Нельзя.',
					'Можно.',
				),
			),
			'Если кто-то из членов «чёрной» команды «стреляет» в другого игрока, «стреляет» более одного раза или не «стреляет», то Судья фиксирует промах, и по итогам «ночи» игровой стол никто не покидает. Далее Судья объявляет: «Мафия удаляется».', // 8.7.
			'Судья объявляет: «Просыпается Дон и ищет Шерифа». Дон снимает игровую маску и показывает пальцами рук Судье номер игрока, которого он считает Шерифом.', // 8.8.
			'Чтобы убедиться, что номер понят правильно, Судья может показать номер для подтверждения Дону, а тот отвечает кивком. Либо Дон отвечает отрицанием, тогда обмен номерами происходит снова до тех пор, пока Судья и Дон не убедятся, что имеют в виду один и тот же номер.', // 8.9.
			'Судья характерным кивком головы подтверждает его версию, либо отрицает. Судья объявляет: «Дон засыпает». Дон надевает игровую маску.', // 8.10.
			'Судья объявляет: «Просыпается Шериф». Шериф снимает игровую маску и показывает пальцами рук Судье номер игрока, которого он хочет проверить на принадлежность к той или иной команде.', // 8.11.
			'Ответ Судьи на номер показанный Шерифом. Чтобы убедиться, что номер понят правильно, судья может показать номер для подтверждения Шерифу, а тот отвечает кивком. Либо Шериф отвечает отрицанием, тогда обмен номерами происходит снова до тех пор, пока Судья и Шериф не убедятся, что имеют в виду один и тот же номер.', // 8.12.
			array // 8.13.
			(
				RULES_SHERIFF_RESPONSE,
				'Ответ на номер показанный Шерифом',
				array
				(
					'Судья кивает в том случае если игрок «черный». Судья мотает головой, если он «красный».',
					'Судья показывает большой палец вниз, если игрок «черный». Судья показывает большой палец вверх, если игрок «красный».',
					'Судья кивает и показывает большой палец вниз в том случае если игрок «черный». Судья мотает головой и показывает большой палец вверх, если он «красный».',
					'Судья кивает, или показывает большой палец вниз в том случае если игрок «черный». Судья мотает головой, или показывает большой палец вверх, если он «красный».',
				),
				array
				(
					'Кивок/мотание головой.',
					'Большой палец вверх/вниз.',
					'И кивок, и большой палец.',
					'Либо кивок, либо большой палец.',
				),
			),
			'Судья объявляет: «Шериф засыпает». Шериф надевает игровую маску.', // 8.14.
			'Дон и Шериф имеют право на одну проверку каждую игровую «ночь».', // 8.15.
			'В игровую ночь игроки должны вести себя в рамках «ночного» поведения описанного в пункте 4.5.', // 8.16.
			array // 8.17.
			(
				RULES_LEGACY,
				'Завещание',
				array
				(
					'Игрок «убитый» в первую ночь имеет право на завещание известное также как «лучший ход», или «prima nota». В своей заключительной речи он может назвать трех игроков которых считает мафией. Если он угадает двух, или трех из них, то может получить дополнительные баллы в соответствии с регламентом турнира. Игрок не имеет права на завещание если по результату голосования в первый день игру покинули 2 или большее количество игроков.',
					'Игрок «убитый» ночю может назвать тройку черных, однако она никак не будет зафиксирована Судьей и не повлияет на результаты турнира.',
					'Игрок «убитый» в любую ночь имеет право на завещание. В своей заключительной речи он может назвать трех игроков которых считает мафией. Если он угадает двух, или трех из них, то может получить дополнительные баллы в соответствии с регламентом турнира.',
				),
				array
				(
					'Принимается для убитого в первую ночь.',
					'Не принимается.',
					'Принимается для убитого в любую ночь.',
				),
			),
			'В последующие «дни» и «ночи» ход игры не меняется, фазы игры чередуются до победы той или иной команды.', // 8.19.
			array // 8.20.
			(
				RULES_GAME_END_SPEECH,
				'Заключительная минута в конце игры',
				array
				(
					'Судья предоставляет заключительную минуту последнему убитому игроку, кроме случаев когда последний убитый игрок был убит замечаниями или удален с игрового стола. И только по окончании заключительной минуты останавливает игру и объявляет победу той или иной команды. При этом замечания и удаления полученные во время последней речи не могут изменить результат игры. Если, например, последний оставшийся мафиози в момент заключительной речи убитого игрока получает четвертое замечание и удаляется из игры, Судья все равно объявляет победу мафии.',
					'Судья не предоставляет заключительного слова, а просто объявляет победу той или иной команды.',
				),
				array
				(
					'Предоставляется.',
					'Не предоставляется.',
				),
			),
			array // 8.21.
			(
				RULES_EXTRA_POINTS,
				'Дополнительные баллы',
				array
				(
					'По окончании игры Судья и его помощники назначают дополнительные баллы игрокам повлиявшим на исход игры. Баллы могут быть как положительными, так и отрицательными. Они назначаются в соответствии с регламентом турнира.',
					'По окончании игры Судья и его помощники могут назначить определенным игрокам звания «лучший игрок» и «лучший ход». При этом «лучший игрок» может присуждаться только одному игроку. И это должен быть игрок победившей команды. «Лучший ход» может быть назначен любому количеству игроков из любых команд. Один и тот же игрок может не больше одного из этих званий. Звания приносят игрокам дополнительные баллы в соответствии с регламентом турнира.',
					'По окончании игры Судья и его помощники могут назначить определенным игрокам звание «лучший игрок». При этом «лучший игрок» может присуждаться только одному игроку. Он не должен быть игроком победившей команды. Звание приносит игрокам дополнительные баллы в соответствии с регламентом турнира.',
					'По окончании игры Судья и его помощники могут назначить определенным игрокам звания «лучший игрок» и «лучший ход». При этом и «лучший игрок», как и «лучший ход» могут присуждаться только одному игроку. Эти игроки не обязаны быть игроками победившей команды. Их нельзя присуждать одному и тому же игроку. Эти звания приносят игрокам дополнительные баллы в соответствии с регламентом турнира.',
				),
				array
				(
					'Как в ФИИМ - назначаются вручную.',
					'Один «лучший игрок» из победившей команды. Любое количество «лучших ходов».',
					'Один «лучший игрок».',
					'Один «лучший игрок» и один «лучший ход».',
				),
			),
		),
	),

	array
	(
		'Дисциплинарный регламент.', // 9.
		array
		(
			'Нарушения правил фиксируются Судьёй.', // 9.1.
			'Игроки, нарушившие правила, наказываются Судьёй игры или Главным Судьёй в соответствии с регламентом.', // 9.2.
			'Существуют следующие наказания. В порядке увеличения строгости.<ul><li>Устное предупреждение.</li><li>Фол.</li><li>Дисквалификация с игры. (Удаление).</li><li>Поражение команды.</li></ul>', // 9.3.
			'В дополнение к наказаниям 9.3.3 и 9.3.4 могут быть применены также турнирные наказания. Это либо снятие турнирных очков, либо дисквалификация с турнира (красная карточка), либо турнирное предупреждение (желтая карточка). Желтая и красная карточки также могут сопровождаться снятием турнирных очков. Это определяется регламентом турнира. См. Правила Лиги по проведению турниров.', // 9.4.
			'При получении трёх фолов игрок лишается права слова в свою ближайшую минуту. За исключением случаем, когда это его последнее слово или оправдательное слово при переголосовании. Игрок лишается слова один раз. В последующие дни игрок получит слово.', // 9.5.
			array // 9.6.
			(
				RULES_THREE_WARNINGS_NOMINATION,
				'Выставление при трех фолах',
				array
				(
					'У игрока получившего три фола остается право выставить кандидатуру на голосование.',
					'Игрок получивший три фола не имеет права выставлять кандидатуру на голосование.',
				),
				array
				(
					'Можно.',
					'Нельзя.',
				),
			),
			'Укороченная речь. Когда за столом остается три или четыре игрока, игроку получившему три фола предоставляется «укороченная» речь 30 секунд.', // 9.7.
			'Если игрок получил 3-й фол и попал в ситуацию переголосования, то он имеет право слова. Он пропустит свое слово в последующие дни.', // 9.8.
			'При получении четвёртого фола или дисквалифицирующего фола игрок немедленно покидает игру без последнего слова.', // 9.9.
			array // 9.10.
			(
				RULES_ANTIMONSTER,
				'Антимонстр: если кто-то ушел замечаниями',
				array
				(
					'Если игрок покидает игровой стол, получая 4-й или дисквалифицирующий фол. Или за нарушение которое карается удалением, ближайшее или текущее голосование не проводится, кроме случаев, когда этот игрок был убит ночью или является покинувшим игру по результату голосования. Если игрок покидает игровой стол, получая 4-й или дисквалифицирующий фол, во время голосования, после того, как был определён результат голосования, и он не является покинувшим игру по результату этого голосования, то следующее голосование не проводится.',
					'Если игрок покидает игровой стол, получая 4-й или дисквалифицирующий фол. Или за нарушение которое карается удалением, это никак не влияет на проведение последующих голосований.',
					'Если игрок покидает игровой стол, получая 4-й или дисквалифицирующий фол. Или за нарушение которое карается удалением, ближайшее или текущее голосование не проводится только в том случае, если этот игрок был выставлен на голосование.',
					'Если игрок покидает игровой стол, получая 4-й или дисквалифицирующий фол. Или за нарушение которое карается удалением, он участвует в голосовании наравне со всеми несмотря на то, что его нет за столом. Если он побеждает в голосовании, больше никто не покидает стол.',
				),
				array
				(
					'Голосование отменяется.',
					'Голосование не отменяется. Монстра будут наказывать как-то по другому.',
					'Голосование отменяется только если монстр был выставлен.',
					'Голосование не отменяется, но монстр участвует в голосовании наравне с живыми.',
				),
			),
			'Игрок всегда имеет право на последнее слово продолжительностью в одну минуту за исключением случаев удаления. Если во время последнего слова игрока после подведения итогов последнего голосования происходит удаление, то результат игры определяется результатом голосования, а удаленный игрок получает штраф в соответствие с регламентом турнира.', // 9.11.
		),
	),

	array
	(
		'Нарушения и наказания.', // 10.
		array
		(
			'Речь не в свою игровую минуту, в том числе междометия и шепот. Фол.', // 10.1.
			'Прикосновение к соседнему игроку (рукой или ногой) в течение дня. Фол.', // 10.2.
			'Излишняя жестикуляция, или стуки по столу, отвлекающие других игроков. Фол.', // 10.3.
			'Любая жестикуляция и призывы во время фазы голосования. Фол.', // 10.4.
			'Не голосование в случае, когда Судья требует поставить оставшиеся голоса против последней кандидатуры. Фол.', // 10.5.
			'Отдергивание руки от стола при голосовании до слова «Спасибо» и подведения итогов. Фол.', // 10.6.
			'Голосование против нескольких кандидатур. Фол.', // 10.7.
			'Ночная жестикуляция, задержка с надеванием маски когда объявлена «ночь», нарушения ночной позы описанной в пункте 4.1.5. Фол.', // 10.8.
			array // 10.9.
			(
				RULES_EARLY_VOTE,
				'Рука на столе до голосования',
				array
				(
					'Постановка руки на стол до голосования. Фол.',
					'Постановка руки на стол до голосования не наказывается.',
				),
				array
				(
					'Фол.',
					'Не наказывается.',
				),
			),
			array // 10.10.
			(
				RULES_UNDERTABLE_SIGN,
				'Жестикуляция под столом',
				array
				(
					'Жестикуляция ниже уровня игрового стола и за спинами игроков. Фол.',
					'Жестикуляция ниже уровня игрового стола и за спинами игроков не наказывается.',
				),
				array
				(
					'Фол.',
					'Не наказывается.',
				),
			),
			array // 10.11.
			(
				RULES_FIRST_KILL_GESTURING,
				'Жестикуляция на первом убитом',
				array
				(
					'Жестикуляция во время заключительной минуты игрока «убитого» в первую игровую «ночь», до совершения им «лучшего хода». Фол.',
					'Жестикуляция во время заключительной минуты игрока «убитого» в первую игровую «ночь», до совершения им «лучшего хода» не наказывается.',
				),
				array
				(
					'Фол.',
					'Не наказывается.',
				),
			),
			'Апелляция к религиозным или другим этическим (и этническими) ценностям с целью доказательства своей роли. Удаление.', // 10.12.
			'Слёзы за игровым столом. Удаление.', // 10.13.
			'Любые выкрики и разговоры «ночью»; любые касания игроков «ночью»; ночные жесты показывающие Шерифу или Дону, кого проверять. Удаление.', // 10.14.
			'Объявление протеста до окончания игры. Удаление.', // 10.15.
			'Голосование ладонью, пальцем, локтем. Удаление.', // 10.16.
			'Использование Шерифом игры уникальной «ночной» информации. Под уникальной ночной информацией понимаются действия игроков или события, которые мог видеть только шериф во время фазы «ночь». Удаление.', // 10.17.
			'Оскорбление другого игрока или Ведущего/Судьи. Удаление.', // 10.18.
			'Использование мата. Удаление.', // 10.19.
			'Грубейшее неэтичное поведение, неуважение к игрокам, ведущему или Оргкомитету. Удаление.', // 10.20.
			array // 10.21.
			(
				RULES_LEGACY_ADVICE,
				'Влияние на «завещание»',
				array
				(
					'Просьба назвать или не называть кого-либо в «завещание», выраженная вслух или с помощью жестикуляции. Удаление.',
					'Просьба назвать или не называть кого-либо в «завещание», выраженная вслух или с помощью жестикуляции. Фол.',
					'Просьба назвать или не называть кого-либо в «завещание», выраженная вслух или с помощью жестикуляции не наказывается.',
				),
				array
				(
					'Удаление.',
					'Фол.',
					'Не наказывается.',
				),
			),
			array // 10.22.
			(
				RULES_LEGACY_ARGUMENT,
				'Ссылка на влияние на «завещание»',
				array
				(
					'Апелляция к влиянию на «завещание» с целью доказательства игровой роли или объяснения игровых действий. Удаление.',
					'Апелляция к влиянию на «завещание» с целью доказательства игровой роли или объяснения игровых действий. Фол.',
					'Апелляция к влиянию на «завещание» с целью доказательства игровой роли или объяснения игровых действий не наказывается.',
				),
				array
				(
					'Удаление.',
					'Фол.',
					'Не наказывается.',
				),
			),
			'Непроизвольное подглядывание «ночью». Удаление.', // 10.23.
			array // 10.24.
			(
				RULES_PRY,
				'Подглядывание',
				array
				(
					'Сознательное подглядывание для получения информации. Иные неигровые способы получения информации. Поражение всей команды.',
					'Сознательное подглядывание для получения информации. Иные неигровые способы получения информации. Удаление.',
				),
				array
				(
					'Поражение всей команды.',
					'Удаление.',
				),
			),
			array // 10.25.
			(
				RULES_AUDIENCE_TIP,
				'Подсказка от зрителей',
				array
				(
					'Получение подсказки из зрительного зала. Любая коммуникация со зрительным залом. Поражение всей команды.',
					'Получение подсказки из зрительного зала. Любая коммуникация со зрительным залом. Удаление.',
				),
				array
				(
					'Поражение всей команды.',
					'Удаление.',
				),
			),
			array // 10.26.
			(
				RULES_OATH,
				'Клятва',
				array
				(
					'Клятва в любой форме, или ее аналоги. Поражение всей команды.',
					'Клятва в любой форме, или ее аналоги. Удаление.',
					'Клятва в любой форме, или ее аналоги. Фол.',
				),
				array
				(
					'Поражение всей команды.',
					'Удаление.',
					'Фол.',
				),
			),
			array // 10.27.
			(
				RULES_THREAT,
				'Шантаж, угрозы, подкуп, пари',
				array
				(
					'Шантаж, угрозы, подкуп, пари, или их аналоги. Поражение всей команды.',
					'Шантаж, угрозы, подкуп, пари, или их аналоги. Удаление.',
				),
				array
				(
					'Поражение всей команды.',
					'Удаление.',
				),
			),
		),
	),
);

?>
