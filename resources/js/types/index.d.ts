import { Config } from "ziggy-js";
import { Utilisateur } from "./models";

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: Utilisateur;
    };
    ziggy: Config & { location: string };
};
