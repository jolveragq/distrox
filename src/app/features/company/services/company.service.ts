// create a service
import { inject, Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { environment } from "../../../../environments/environment";
import type { Observable } from "rxjs";
import type { DistroxResponse } from "../../../core/models/distrox.response";
import type { ApiCompany } from "../models/api.company";

@Injectable()
export class CompanyService {
	private http = inject(HttpClient);
	getCompanies(): Observable<DistroxResponse<ApiCompany[]>> {
		return this.http.get<DistroxResponse<ApiCompany[]>>(
			`${environment.apiUrl}companies`,
		);
	}

	getCompany(id: number): Observable<DistroxResponse<ApiCompany>> {
		return this.http.get<DistroxResponse<ApiCompany>>(
			`${environment.apiUrl}companies/${id}`,
		);
	}

	createCompany(data: any): Observable<any> {
		return this.http.post(`${environment.apiUrl}companies`, data);
	}

	updateCompany(id: number, data: any): Observable<any> {
		return this.http.put(`${environment.apiUrl}companies/${id}`, data);
	}

	deleteCompany(id: number): Observable<any> {
		return this.http.delete(`${environment.apiUrl}companies/${id}`);
	}
}
