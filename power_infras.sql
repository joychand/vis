CREATE TABLE public.power_infras
(
    id bigint NOT NULL DEFAULT nextval('"PowerInfras_id_seq"'::regclass),
    village_code character varying(10) COLLATE pg_catalog."default",
    household_no integer,
    electrified_household_no integer,
    reference_year integer,
    CONSTRAINT power_infras_pk PRIMARY KEY (id),
    CONSTRAINT villages_power_infras_fk FOREIGN KEY (village_code)
        REFERENCES public.villages (village_code) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.power_infras
    OWNER to postgres;

-- Index: fki_villages_power_infras_fk

-- DROP INDEX public.fki_villages_power_infras_fk;

CREATE INDEX fki_villages_power_infras_fk
    ON public.power_infras USING btree
    (village_code COLLATE pg_catalog."default")
    TABLESPACE pg_default;