--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	Wird ersetzt durch	Eine zugehörige Ressource, die die beschriebene Ressource verdrängt, verdrängt oder überlagern kann.
2	Ist Format von	Eine bereits vorhandene zugehörige Ressource, die im Wesentlichen die gleiche ist wie die beschriebene Ressource, jedoch in einem anderen Format.
3	Ist Teil von	Eine zugehörige Ressource, in der die beschriebene Ressource physisch oder logisch eingeschlossen ist.
4	Wird von referenziert durch	Eine zugehörige Ressource, die auf die beschriebene Ressource verweist, sie zitiert oder auf andere Weise verweist.
5	Ist erforderlich von	Eine zugehörige Ressource, für die die beschriebene Ressource benötigt wird, um ihre Funktion, ihre Bereitstellung oder ihre Kohärenz zu unterstützen.
6	Ist Version von	Eine zugehörige Ressource, von der die beschriebene Ressource eine Version, eine Edition oder eine Anpassung ist.
7	Hat Format	Eine zugehörige Ressource, die im Wesentlichen mit der bereits zuvor beschriebenen Ressource übereinstimmt, jedoch in einem anderen Format.
8	Hat Teil	Eine zugehörige Ressource, die physisch oder logisch in der beschriebenen Ressource enthalten ist.
9	Hat Version	Eine zugehörige Ressource, die eine Version, eine Edition oder eine Anpassung der beschriebenen Ressource ist.
\.

SELECT setval('dublin_core_relation_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

