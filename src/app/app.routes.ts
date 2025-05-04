import type { Routes } from "@angular/router";

export const routes: Routes = [
	{
		path: "",
		redirectTo: "auth",
		pathMatch: "full",
	},
	{
		path: "auth",
		loadComponent: () =>
			import("./features/auth/auth-container/auth-container.component").then(
				(m) => m.AuthContainerComponent,
			),
	},
	{
		path: "**",
		redirectTo: "auth",
	},
];
