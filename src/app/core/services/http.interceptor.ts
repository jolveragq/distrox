import { inject } from "@angular/core";
import type { HttpInterceptorFn } from "@angular/common/http";
import { Store } from "@ngrx/store";
import { finalize } from "rxjs/operators";
import { CoreActionTypes } from "../ngrx/core.actions";

export const httpInterceptor: HttpInterceptorFn = (req, next) => {
	const store = inject(Store);

	store.dispatch(CoreActionTypes.ShowLoading());

	return next(req).pipe(
		finalize(() => {
			store.dispatch(CoreActionTypes.HideLoading());
		}),
	);
};
