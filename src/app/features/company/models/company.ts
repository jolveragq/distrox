import type { ApiCompany } from "./api.company";

export interface Company extends Omit<ApiCompany, "created_at" | "updated_at"> {
	created_at: Date;
	updated_at: Date;
}
