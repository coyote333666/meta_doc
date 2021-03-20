--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_element (id, element, definition) FROM stdin;
1	Titel	Ein Name, der der Ressource zugeordnet ist.
2	Betreff	Das Thema der Ressource.
3	Beschreibung	Ein Account der Ressource.
4	Ersteller	Eine Einheit, die in erster Linie für die Ressourcenherstellung verantwortlich ist.
5	Herausgeber	Eine Entität, die für die Bereitstellung der Ressource verantwortlich ist.
6	Mitwirkender	Eine Entität, die für die Bereitstellung von Beiträgen für die Ressource verantwortlich ist.
7	Datum	Ein Punkt oder ein Zeitraum, der einem Ereignis im Lebenszyklus der Ressource zugeordnet ist.
8	Typ	Die Art oder das Genre der Ressource.
9	Format	Das Dateiformat, das physische Medium oder die Dimensionen der Ressource.
10	Kennung	Ein eindeutiger Verweis auf die Ressource in einem bestimmten Kontext.
11	Quelle	Eine zugehörige Ressource, aus der die beschriebene Ressource abgeleitet wird.
12	Sprache	Eine Sprache der Ressource.
13	Beziehung	Eine zugehörige Ressource.
14	Abdeckung	Das räumliche oder zeitliche Thema der Ressource, die räumliche Anwendbarkeit der Ressource oder die Jurisdiktion, unter der die Ressource relevant ist.
15	Rechte	Informationen zu Rechten, die in und über die Ressource gehalten werden.
16	Ausgegeben	Datum der förmlichen Ausgabe der Ressource.
\.

SELECT setval('dublin_core_element_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

