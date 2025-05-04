import type { ApiCompany } from "../models/api.company";
import type { Company } from "../models/company";
import { TimestampService } from "../../../core/services/timestamp.service";

// biome-ignore lint/complexity/noStaticOnlyClass: <explanation>
export class CompanyTransformer {
	static toDomain(apiCompany: ApiCompany): Company {
		return TimestampService.convertTimestamps(apiCompany) as Company;
	}
}
