--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_element (id, element, definition) FROM stdin;
1	Title	A name given to the resource.
2	Subject	The topic of the resource.
3	Description	An account of the resource.
4	Creator	An entity primarily responsible for making the resource.
5	Publisher	An entity responsible for making the resource available.
6	Contributor	An entity responsible for making contributions to the resource.
7	Date	A point or period of time associated with an event in the lifecycle of the resource.
8	Type	The nature or genre of the resource.
9	Format	The file format, physical medium, or dimensions of the resource.
10	Identifier	An unambiguous reference to the resource within a given context.
11	Source	A related resource from which the described resource is derived.
12	Language	A language of the resource.
13	Relation	A related resource.
14	Coverage	The spatial or temporal topic of the resource, the spatial applicability of the resource, or the jurisdiction under which the resource is relevant.
15	Rights	Information about rights held in and over the resource.
16	issued	Date of formal issuance of the resource.
\.

SELECT setval('dublin_core_element_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

