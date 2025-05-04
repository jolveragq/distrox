import { createFeatureSelector, createSelector } from "@ngrx/store";
import type { CoreState } from "./core.state";

export const selectCore = createFeatureSelector<CoreState>("core");
export const selectLoading = createSelector(
	selectCore,
	(state) => state.loading,
);
