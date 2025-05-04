import { createAction } from "@ngrx/store";

export const CoreActionTypes = {
	ShowLoading: createAction("[Core] Show Loading"),
	HideLoading: createAction("[Core] Hide Loading"),
};
