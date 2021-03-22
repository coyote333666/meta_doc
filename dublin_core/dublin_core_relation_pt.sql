--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	É Substituído Por	Um recurso relacionado que suplanta, desloca ou suplanta o recurso descrito.
2	É Formato De	Um recurso relacionado pré-existente que é substancialmente o mesmo que o recurso descrito, mas em outro formato.
3	Faz Parte De	Um recurso relacionado no qual o recurso descrito está fisicamente ou logicamente incluído.
4	É Referenciado Por	Um recurso relacionado que se referencia, cita ou, de outra forma, aponta para o recurso descrito.
5	É Necessário Por	Um recurso relacionado que requer o recurso descrito para suportar sua função, entrega ou coerência.
6	É Versão De	Um recurso relacionado do qual o recurso descrito é uma versão, edição ou adaptação.
7	Tem Formato	Um recurso relacionado que é substancialmente o mesmo que o recurso descrito pré-existente, mas em outro formato.
8	Tem Parte	Um recurso relacionado que é incluído fisicamente ou logicamente no recurso descrito.
9	Tem Versão	Um recurso relacionado que é uma versão, edição ou adaptação do recurso descrito.
\.

SELECT setval('dublin_core_relation_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

