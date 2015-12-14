DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS event_types;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS invites;
DROP TABLE IF EXISTS registrations;
DROP TABLE IF EXISTS comments;

--Table creation

CREATE TABLE users
(
	userId			INTEGER PRIMARY KEY AUTOINCREMENT,
	username		VARCHAR UNIQUE,
	name			VARCHAR,
	password		VARCHAR
);

CREATE TABLE event_types
(
	typeId			INTEGER PRIMARY KEY AUTOINCREMENT,
	typeName		VARCHAR UNIQUE
);

CREATE TABLE events
(
	eventId			INTEGER PRIMARY KEY AUTOINCREMENT,
	ownerId			INTEGER REFERENCES users,
	typeId			INTEGER REFERENCES event_types,
	visibility		INTEGER, --// 0 - private; other - public
	imageURL		VARCHAR,
	title			VARCHAR,
	description		VARCHAR,
	eventTime		VARCHAR
);

CREATE TABLE invites
(
	eventId			INTEGER REFERENCES events,
	userId			INTEGER REFERENCES users,
	PRIMARY KEY(eventId, userId)
);

CREATE TABLE registrations
(
	eventId			INTEGER REFERENCES events,
	userId			INTEGER REFERENCES users,
	PRIMARY KEY(eventId, userId)
);

CREATE TABLE comments
(
	commentId		INTEGER PRIMARY KEY AUTOINCREMENT,
	userId			INTEGER REFERENCES users,
	eventId			INTEGER REFERENCES events,
	text			VARCHAR
);

-- Insert random data
INSERT INTO users VALUES(NULL, 'admin', 'Bradley Edric', 'd033e22ae348aeb5660fc2140aec35850c4da997');
INSERT INTO users VALUES(NULL, 'test', 'Gray Taylor', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');
INSERT INTO users VALUES(NULL, 'unknown', 'Mitch Kennith', '50d8b4a941c26b89482c94ab324b5a274f9ced66');
INSERT INTO users VALUES(NULL, 'owen', 'Owen Madlyn', '9069d0e8b554bca3df1592c83c498c5cd0661c2e');
INSERT INTO users VALUES(NULL, 'linden', 'Linden Morgana', '98d356ae7443cf19f89c9e8655ec505f8d3a45bc');
INSERT INTO users VALUES(NULL, 'clairesammie', 'Claire Sammie', 'd67651ed34009a27fb232f342b58659438606afd');

INSERT INTO event_types VALUES(NULL, 'Party');
INSERT INTO event_types VALUES(NULL, 'Concert');
INSERT INTO event_types VALUES(NULL, 'Conference');
INSERT INTO event_types VALUES(NULL, 'Other');

INSERT INTO events VALUES(NULL, 1, 2, 1, "http://www.casadamusica.com/ImageGen.ashx?image=/media/5998908/04-dezembro-2015_ana_quintans_1_destaque.jpg", "Ópera em Viena", "Internacionalmente aclamado como especialista do Classicismo Vienense e do repertório lírico Mozartiano, Leopold Hager, Maestro Convidado Principal da Orquestra Sinfónica do Porto Casa da Música, dirige a soprano Ana Quintans em árias famosas de Gluck e Mozart, percorrendo sentimentos diversos desde a mais sentida tristeza à mais exuberante alegria. A soprano portuguesa tem sido uma presença regular em produções de ópera europeias com consagrados agrupamentos e maestros da actualidade.
	Uma sinfonia particularmente festiva de Mozart e a sinfonia com que Beethoven coroou o Classicismo, anunciando novos rumos à música vienense, completam um fascinante programa com obras sobejamente célebres.", "2015-12-04 21:00");
INSERT INTO events VALUES(NULL, 2, 2, 0, "http://www.casadamusica.com/ImageGen.ashx?image=/media/6363240/12-dezembro-2015_arditti_quartet_02__astrid_karger_destaque.jpg", "Concerto Imperador", "O Concerto Imperador coroa a integral dos concertos para piano e orquestra de Beethoven que Pedro Burmester apresenta ao longo de 2015. O mais imponente e grandioso dos concertos que o mestre de Bona compôs foi escrito durante o bombardeamento e ocupação da cidade de Viena pelas tropas de Napoleão. É uma obra predilecta do grande público e uma das que mais influenciou a escrita dos compositores Românticos. Foi este o concerto que o lendário maestro Georg Solti convidou Pedro Burmester para interpretar na abertura da Lisboa, Capital da Cultura, em 1994.
	O programa tem início com um Concerto para quarteto de cordas e orquestra de Helmut Lachenmann, Compositor em Residência, contando com o Quarteto Arditti que já gravou a obra para a editora Montaigne. ", "2015-12-12 18:00");
INSERT INTO events VALUES(NULL, 6, 1, 1, "https://scontent.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/s720x720/11218907_1206668206026727_7384730616259514794_n.jpg?oh=cfbec9e787b129c5294bef172a6f563d&oe=56D9D8C1", "Divas Party", "A Secret-G Events apresenta uma vez mais um evento que vai fazer agitar a noite GLS do Porto, em parceria com a discoteca Zoomglsdisco Porto e a BV Music

	****DIVAS PARTY****
	SEXTA 11 DE DEZEMBRO 2015

	DJ MAQ aka Miguel Quitério (um dos melhores DJs Nacionais)

	DIVAS PARTY é o tema, e como indica, sim, irás ouvir, dançar e cantar os temas de todas as tuas divas! Será que aguentas?

	Quem irá ser como a Britney Spears e dançar até o mundo acabar? Quem irá entrar na festa", "2015-12-11 23:55");
INSERT INTO events VALUES(NULL, 6, 2, 1, "http://www.casadamusica.com/ImageGen.ashx?image=/media/8094829/grigory-sokolov-1440x550px.jpg", "Grigoy Sokolov", "No extenso rol dos grandes pianistas russos da actualidade, Grigory Sokolov alcançou um estatuto de primeiro entre iguais, fazendo de cada recital a solo uma experiência única e inesquecível. Sokolov fez o seu primeiro recital a solo em Moscovo com apenas 12 anos de idade e quatro anos mais tarde tornou‑se no mais jovem vencedor de sempre do Concurso Tchaikovski. Celebrou os seus 18 anos de idade na cidade do Porto, com dois recitais no Teatro Rivoli. Desde a abertura da Casa da Música é o único pianista que regressa anualmente ao Ciclo de Piano, sempre com um programa novo, interpretações arrebatadoras e longas sessões de encores.", "2016-03-08 21:00");
INSERT INTO events VALUES(NULL, 5, 2, 1, "http://www.casadamusica.com/ImageGen.ashx?image=/media/8095545/martin-andre-1440x550px.jpg", "Quadros Russos", "O empolgante Concerto para piano e orquestra nº 1 de Rachmaninoff representa um dos mais auspiciosos inícios de carreira da História da Música ocidental.
	Foi a primeira obra do catálogo de um compositor que contava apenas dezoito anos e que elevou o conceito de virtuosismo e de fusão entre piano e orquestra a um novo patamar dentro da herança romântica. Aluno da grande pianista Elisso Virsaladze no Conservatório de Moscovo, João Xavier foi um dos Jovens Talentos a inaugurar um Ciclo de Piano na Casa da Música e desde então já viu a sua carreira distinguida com prémios internacionais.
	Quadros de uma exposição de Mussorgski permanece como uma das grandes obras‑primas da música russa e, sendo uma peça favorita do grande público, constitui a mais célebre orquestração que Ravel fez de obras de outros autores.", "2016-03-18 18:00");
INSERT INTO events VALUES(NULL, 3, 4, 0, "http://www.coliseu.pt/components/com_rseventspro/assets/images/events/circo.png", "Circo do Coliseu do Porto", "O Circo do Coliseu Porto está de volta à cidade.
	No mês de Dezembro, a caravana do circo chega ao Coliseu Porto para mais uma edição do nosso Circo de Natal.
	Sem números com animais, a pista vai encher-se com a alegria contagiante dos palhaços e a magia das trupes de acrobatas.
	Este ano, todos os números foram programados pelo Coliseu Porto, numa selecção clássica e eclética que inclui escolhas como a trupe de equilibristas do Circo Nacional de Xangai, o triplo salto mortal dos trapezistas The Flying Aces, Nicole Burgio, e muitos mais artistas.
	E para a festa ser completa, venha celebrar connosco a magia do Natal.", "2015-12-11 21:00");
INSERT INTO events VALUES(NULL, 3, 2, 1, "http://www.coliseu.pt/components/com_rseventspro/assets/images/events/thumbs/b_paulafernandes_1132x472.png?nocache=5663645116425", "Paula Fernandes", "Uma das artistas que mais brilha na atualidade no Brasil, vai voltar à Europa e a Portugal. Antes de passar por países como Suíça e Luxemburgo, vai pisar os palcos de Coliseu Porto, Portimão Arena e Coliseu de Lisboa, nos dias 23, 24 e 25 de Março, respectivamente. O sonho de menina, à realidade da estrela em que se tornou Paula Fernandes é contado de maneira subtil e real.
	A artista que já vendeu mais de 3 milhões de discos e 3 milhões de dvd´s, que tem uma média superior a 2 milhões de pessoas a assistir aos seus concertos por ano, que tem mais de 250 milhões de visualizações no canal VEVO da cantora no Youtube, vem a Portugal, depois de lançar em Outubro o seu novo álbum de originais.
	A expectativa para as datas de Portugal, é que sejam salas esgotadas, para ouvir o timbre inigualável de uma das melhores vozes do Brasil.", "2016-03-23 21:30");
INSERT INTO events VALUES(NULL, 2, 3, 1, "https://scontent.xx.fbcdn.net/hphotos-xpl1/t31.0-0/q86/p240x240/12307457_10153781367258656_3669451263862265827_o.jpg", "Direito à cidade: criminalização da pobreza", "
	Simpósio 'Direito à cidade: criminalização da pobreza'Este simpósio será o terceiro da série 'Direito à cidade' que teve início durante a 31ª Bienal de São Paulo. 'Direito à cidade' prosseguirá a sua investigação sobre a linguagem hostil e a gestão militarizada dos espaços urbanos, visíveis hoje por toda a parte nas cidades globalizadas. Irá debater os significados e efeitos da lógica de segurança que rege a gestão das cidades e dos seus espaços, populações, costumes e movimentos. Se é verdade que a evidência abunda, os nexos que articulam o governo da segurança, o governo dos espaços urbanos e as estratégias de privatização do espaço público continuam a ser entendidos como estratégias de poder, violência e produção de mercados. Em Serralves, o objetivo do projeto é discutir as conexões entre o desenvolvimento urbano e os direitos dos cidadãos no Brasil e em Portugal. Analisaremos a atual política de controlo de multidões no que diz respeito à criminalização dos pobres e à militarização da polícia em cidades portuguesas e brasileiras. O simpósio reúne artistas, ativistas e académicos de Portugal e do Brasil.", "2015-12-12 15:00");
INSERT INTO events VALUES(NULL, 2, 3, 1, "https://scontent.xx.fbcdn.net/hphotos-xta1/t31.0-0/p240x240/12322830_10153781372638656_5346704160453376852_o.jpg", "TENDÊNCIAS GLOBAIS 2030", "Em 2030, a governação mundial será marcada pela existência de uma multiplicidade de atores: grandes potências tradicionais e não-ocidentais – com destaque para a China e a India, países com mais de mil milhões de habitantes – mas também organizações não-governamentais, cidades ou regiões. Que perspetiva de ordem internacional tem potências emergentes como a Índia, a China ou o Brasil? Que papel para as nações africanas e as suas organizações regionais? Qual pode ser o papel dos Estados Unidos e da UE? Como se devem adaptar as instituições multilaterais às novas relações de poder? É o multilateralismo inclusivo a alternativa ao défice de governação?", "2015-12-10 21:30");
INSERT INTO events VALUES(NULL, 3, 2, 1, "http://www.casadamusica.com/ImageGen.ashx?image=/media/8097368/m_rio-azevedo-1440_550px.jpg", "Sinfonia Patética", "Tchaikovski é considerado o maior compositor russo de sempre. A sua inspiração melódica era verdadeiramente incrível e na sua obra encontramos um sem fim de melodias belíssimas, extremamente conhecidas. A sua música é igualmente capaz de nos transmitir emoções fortíssimas. Como orquestrador tem rasgos de génio e é capaz de colocar grandes desafios aos músicos, como o de levar um fagote ao extremo do registo grave com a indicação de pppppp (o mais pianíssimo imaginável), algo aparentemente impossível de conseguir mas que é pedido nesta sinfonia. Mas Tchaikovski era também um homem obcecado pela ideia de um destino fatal ao qual não conseguia escapar. Essa ideia tomou conta das suas últimas sinfonias, dando origem a narrativas extra‑musicais.
	A da Sexta Sinfonia ficou oculta por vontade do compositor e continua a representar um mistério para todos os músicos, dando origem a diversas teorias sobre a vida do compositor.", "2016-04-17 12:00");
INSERT INTO events VALUES(NULL, 1, 2, 1, "http://www.casadamusica.com/ImageGen.ashx?image=/media/5999182/06-dezembro-2015_ospcm_destaque.jpg", "A Pintura de Beethoven", "A Segunda Sinfonia de Beethoven reflecte a afirmação de um estilo pessoal que se tornaria inconfundível. Com um primeiro andamento grandioso e pleno de contrastes dinâmicos e de orquestração, tem no Larghetto seguinte uma invenção melódica prodigiosa. Berlioz disse que “era uma pintura deslumbrante de uma felicidade inocente apenas ensombrada por alguns raros acentos de melancolia”. Através dos comentários de Helena Marinho partimos à descoberta desta pintura e dos seus mais preciosos detalhes.", "2016-12-06 12:00");
INSERT INTO events VALUES(NULL, 6, 2, 0, "http://www.casadamusica.com/ImageGen.ashx?image=/media/8093799/takuo-yuasa-1440_550px.jpg", "Música no Cinema Americano", "A profícua relação entre a primeira e a sétima arte faz com que certos filmes sejam indissociáveis das suas bandas sonoras. Da mesma forma, ao ouvirmos determinadas músicas lembramo‑nos imediatamente dos filmes em que foram utilizadas. As obras em programa são exemplos máximos desta feliz associação entre a música e o cinema. Dos cenários apocalípticos da Guerra do Vietname, acompanhados ao som do Adagio de Samuel Barber, à intensa paixão proibida de Breve Encontro, à qual a música de Rachmaninoff dá um tom arrebatador, este é um programa feito de obras favoritas do grande público.", "2016-02-19 21:00");
INSERT INTO events VALUES(NULL, 5, 2, 1, "http://www.casadamusica.com/ImageGen.ashx?image=/media/8094879/benjamin-schmid-1440_550px.jpg", "Um violino em Viena", "
	O violinista austríaco Benjamin Schmid já gravou mais de 40 CDs com os quais conquistou os mais prestigiados prémios da crítica internacional. Com o seu violino Stradivarius, de 1731, é presença regular nas temporadas das grandes orquestras mundiais. Num programa inteiramente dedicado à música vienense do século XX, sob a direcção do reputado especialista do repertório austríaco Leopold Hager, Benjamin Schmid interpreta o emotivo Concerto à memória de um anjo de Alban Berg. A partitura foi dedicada a Manon, filha do célebre fundador da Bauhaus, Walter Gropius, e de Alma, viúva de Mahler. Os poemas sinfónicos de Strauss e o impacto enérgico de Mahler provocaram grande furor na vida musical de Viena. Esta influência fez‑se sentir em obras de juventude da geração seguinte, como No vento de Verão de Webern, mas sobretudo no fabuloso poema sinfónico de Schoenberg que encerrou o século XIX com chave de ouro – Noite Transfigurada.", "2016-03-12 18:00");

INSERT INTO comments VALUES(NULL, 3, 2, "Recomendo!");
INSERT INTO comments VALUES(NULL, 2, 2, "I'm looking forward to this.");
INSERT INTO comments VALUES(NULL, 1, 2, "I hope it will be good.");
INSERT INTO comments VALUES(NULL, 5, 11, "I saw it last year, and it was great!");
INSERT INTO comments VALUES(NULL, 6, 10, "Muito Bom");
INSERT INTO comments VALUES(NULL, 1, 7, "Anyone knows where will this take place?");
INSERT INTO comments VALUES(NULL, 3, 1, "Alguém sabe se vai ocorrer noutra altura?");
INSERT INTO comments VALUES(NULL, 5, 8, "This is a useless comment.");
INSERT INTO comments VALUES(NULL, 2, 5, "This will definately be awesome.");
INSERT INTO comments VALUES(NULL, 6, 12, "YES!");
INSERT INTO comments VALUES(NULL, 2, 8, "Finalmente...");
INSERT INTO comments VALUES(NULL, 3, 10, "Gostaria de ir, mas a hora não é a melhor :(");
	INSERT INTO comments VALUES(NULL, 1, 3, "I'm glad this will happen :D");
	INSERT INTO comments VALUES(NULL, 5, 8, "Is there any more info?");
	INSERT INTO comments VALUES(NULL, 6, 5, "Estou ansiosa.");
	INSERT INTO comments VALUES(NULL, 1, 7, "Vai ser bom certamente.");
	INSERT INTO comments VALUES(NULL, 3, 12, "I didn't really enjoy it last time.");
	INSERT INTO comments VALUES(NULL, 2, 5, "I recommend this!");
	INSERT INTO comments VALUES(NULL, 1, 9, "I suggest you go half an hour earlier.");
	INSERT INTO comments VALUES(NULL, 5, 4, "UAU!!!");
	INSERT INTO comments VALUES(NULL, 4, 3, "I'll go!");
	INSERT INTO comments VALUES(NULL, 6, 6, "Eu vou!");
	INSERT INTO comments VALUES(NULL, 4, 4, "Estou a pensar ir.");
	INSERT INTO comments VALUES(NULL, 4, 11, "I'm still not sure...");
	INSERT INTO comments VALUES(NULL, 6, 2, "No ano passado não foi grande coisa...");