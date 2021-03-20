--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	È Sostituito Da	Una risorsa correlata che supina, si sposta o sovrasta la risorsa descritta.
2	È Formato Di	Una risorsa correlata pre - esistente che è sostanzialmente la stessa della risorsa descritta, ma in un altro formato.
3	È parte di	Una risorsa correlata in cui la risorsa descritta è fisicamente o logicamente inclusa.
4	A Cui Si Fa Riferimento	Una risorsa correlata che rimanda, cita o altrimenti punta alla risorsa descritta.
5	È obbligatorio per	Una risorsa correlata che richiede la risorsa descritta per supportare la sua funzione, la consegna o la coerenza.
6	È Versione Of	Una risorsa correlata di cui la risorsa descritta è una versione, edizione o adattamento.
7	Ha formato	Una risorsa correlata che è sostanzialmente la stessa della risorsa descritta pre - esistente, ma in un altro formato.
8	Ha parte	Una risorsa correlata che è inclusa fisicamente o logicamente nella risorsa descritta.
9	Ha la versione	Una risorsa correlata che è una versione, edizione o adattamento della risorsa descritta.
\.

SELECT setval('dublin_core_relation_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

