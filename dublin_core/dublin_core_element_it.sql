--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_element (id, element, definition) FROM stdin;
1	Titolo	Un nome dato alla risorsa.
2	Oggetto	L'argomento della risorsa.
3	Descrizione	Un conto della risorsa.
4	Creatore	Un'entità principalmente responsabile di rendere la risorsa.
5	Editore	Un'entità responsabile di rendere la risorsa disponibile.
6	Collaboratore	Un'entità responsabile del rendere i contributi alla risorsa.
7	Data	Un punto o periodo di tempo associato a un evento nel ciclo di vita della risorsa.
8	Tipo	La natura o il genere della risorsa.
9	Formato	Il formato del file, il mezzo fisico o le dimensioni della risorsa.
10	Identificativo	Un riferimento inequivocabile alla risorsa all'interno di un determinato contesto.
11	Fonte	Una risorsa correlata da cui deriva la risorsa descritta.
12	Lingua	Una lingua della risorsa.
13	Relazione	Una risorsa correlata.
14	Copertura	L'argomento spaziale o temporale della risorsa, l'applicabilità territoriale della risorsa, o la giurisdizione in base alla quale la risorsa è rilevante.
15	Diritti	Informazioni sui diritti detenuti in e sulla risorsa.
16	emesso	Data di emissione formale della risorsa.
\.

SELECT setval('dublin_core_element_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

