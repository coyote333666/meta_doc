--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_element (id, element, definition) FROM stdin;
1	Título	Um nome dado ao recurso.
2	Assunto	O tópico do recurso.
3	Descrição	Uma conta do recurso.
4	Criador	Uma entidade primariamente responsável por fazer o recurso.
5	Editor	Uma entidade responsável por disponibilizar o recurso.
6	Contribuinte	Uma entidade responsável por fazer contribuições para o recurso.
7	Data	Um ponto ou período de tempo associado a um evento no ciclo de vida do recurso.
8	Tipo	A natureza ou o gênero do recurso.
9	Formato	O formato de arquivo, meio físico ou dimensões do recurso.
10	Identificador	Uma referência inequívoca ao recurso dentro de um determinado contexto.
11	Fonte	Um recurso relacionado do qual o recurso descrito é derivado.
12	Idioma	Uma linguagem do recurso.
13	Relação	Um recurso relacionado.
14	Cobertura	O tópico espacial ou temporal do recurso, a aplicabilidade espacial do recurso, ou a jurisdição sob a qual o recurso é relevante.
15	Direitos	Informações sobre direitos mantidos no e sobre o recurso.
16	emitido	Data de emissão formal do recurso.
\.

SELECT setval('dublin_core_element_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

