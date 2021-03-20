--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	Est remplacé par	Ressource connexe qui supplante ou remplace la ressource décrite.
2	Est un format de	Ressource connexe préexistante qui est essentiellement la même que la ressource décrite, mais dans un autre format.
3	Est une partie de	Ressource connexe dans laquelle la ressource décrite est incluse physiquement ou logiquement.
4	Est référencé par	Ressource associée qui référence, cite ou désigne d'une autre manière la ressource décrite.
5	Est requis par	Ressource connexe qui requiert la ressource décrite pour prendre en charge sa fonction, sa livraison ou sa cohérence.
6	Est la version de	Ressource connexe dont la ressource décrite est une version, une édition ou une adaptation.
7	A un format	Ressource connexe qui est essentiellement la même que la ressource décrite préexistante, mais dans un autre format.
8	A une pièce	Ressource associée incluse physiquement ou logiquement dans la ressource décrite.
9	A une version	Ressource connexe qui est une version, une édition ou une adaptation de la ressource décrite.
\.

SELECT setval('dublin_core_relation_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

