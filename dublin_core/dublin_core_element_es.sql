--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_element (id, element, definition) FROM stdin;
1	Título	Nombre proporcionado al recurso.
2	Subject	El tema del recurso.
3	Descripción	Una cuenta del recurso.
4	Creador	Una entidad principalmente responsable de realizar el recurso.
5	Editor	Una entidad responsable de hacer que el recurso esté disponible.
6	Colaborador	Una entidad responsable de realizar contribuciones al recurso.
7	Fecha	Punto o periodo de tiempo asociado a un suceso en el ciclo de vida del recurso.
8	Tipo	La naturaleza o género del recurso.
9	Formato	Formato de archivo, medio físico o dimensiones del recurso.
10	Identificador	Una referencia inequívoca al recurso dentro de un contexto determinado.
11	Fuente	Recurso relacionado del que se deriva el recurso descrito.
12	Lengua	Un idioma del recurso.
13	Relación	Un recurso relacionado.
14	Cobertura	El tema espacial o temporal del recurso, la aplicabilidad espacial del recurso o la jurisdicción bajo la que el recurso es relevante.
15	Derechos	Información sobre los derechos retenidos en y sobre el recurso.
16	Expedido	Fecha de emisión formal del recurso.
\.

SELECT setval('dublin_core_element_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

