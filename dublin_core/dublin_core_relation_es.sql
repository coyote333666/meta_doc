--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	Se Sustituye Por	Recurso relacionado que suplanta, desplaza o reemplaza el recurso descrito.
2	Es Formato De	Recurso relacionado preexistente que es sustancialmente el mismo que el recurso descrito, pero en otro formato.
3	Es Parte De	Recurso relacionado en el que el recurso descrito se incluye física o lógicamente.
4	Se Hace Referencia Por	Recurso relacionado que hace referencia, cita o de lo contrario apunta al recurso descrito.
5	Es Necesario Para	Recurso relacionado que requiere el recurso descrito para dar soporte a su función, entrega o coherencia.
6	Es Versión De	Recurso relacionado del que el recurso descrito es una versión, edición o adaptación.
7	Tiene formato	Recurso relacionado que es sustancialmente el mismo que el recurso descrito previamente, pero en otro formato.
8	Tiene Parte	Recurso relacionado que se incluye física o lógicamente en el recurso descrito.
9	Tiene versión	Recurso relacionado que es una versión, edición o adaptación del recurso descrito.
\.

SELECT setval('dublin_core_relation_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

