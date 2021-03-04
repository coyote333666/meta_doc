--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	isReplacedBy	A related resource that supplants, displaces, or supersedes the described resource.
2	isFormatOf	A pre-existing related resource that is substantially the same as the described resource, but in another format.
3	isPartOf	A related resource in which the described resource is physically or logically included.
4	isReferencedBy	A related resource that references, cites, or otherwise points to the described resource.
5	isRequiredBy	A related resource that requires the described resource to support its function, delivery, or coherence.
6	isVersionOf	A related resource of which the described resource is a version, edition, or adaptation.
7	hasFormat	A related resource that is substantially the same as the pre-existing described resource, but in another format.
8	hasPart	A related resource that is included either physically or logically in the described resource.
9	hasVersion	A related resource that is a version, edition, or adaptation of the described resource.
\.

SELECT setval('dublin_core_relation_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

