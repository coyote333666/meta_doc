--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_element (id, element, definition) FROM stdin;
1	Titre	Nom attribué à la ressource.
2	Objet	Le sujet de la ressource.
3	Description	Un compte de la ressource.
4	Créateur	Entité principalement responsable de la création de la ressource.
5	Éditeur	Entité responsable de la mise à disposition de la ressource.
6	Contributeur	Entité responsable de la contribution à la ressource.
7	Date	Point ou période de temps associé à un événement dans le cycle de vie de la ressource.
8	Type	La nature ou le genre de la ressource.
9	Format	Format de fichier, support physique ou dimensions de la ressource.
10	Identificateur	Une référence claire à la ressource dans un contexte donné.
11	Source	Ressource connexe à partir de laquelle la ressource décrite est dérivée.
12	Langue	Une langue de la ressource.
13	Relation	Une ressource associée.
14	Couverture	Le sujet spatial ou temporel de la ressource, l'applicabilité spatiale de la ressource ou la compétence en vertu de laquelle la ressource est pertinente.
15	Droits	Informations sur les droits détenus dans et sur la ressource.
16	émis	Date d'émission officielle de la ressource.
\.

SELECT setval('dublin_core_element_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

