import { createReducer, on } from "@ngrx/store";
import { coreInitialState } from "./core.state";
import { CoreActionTypes } from "./core.actions";

export const coreReducer = createReducer(
	coreInitialState,
	on(CoreActionTypes.ShowLoading, (state) => {
		console.log("Show loading");
		return { ...state, loading: true };
	}),
	on(CoreActionTypes.HideLoading, (state) => {
		console.log("Hide loading");
		return { ...state, loading: false };
	}),
);
