import { Component, inject } from "@angular/core";
import { Store } from "@ngrx/store";
import { selectLoading } from "../../ngrx/core.selectors";
import { NgIf } from "@angular/common";

@Component({
	selector: "app-loading",
	imports: [NgIf],
	templateUrl: "./loading.component.html",
	styleUrl: "./loading.component.scss",
})
export class LoadingComponent {
	store = inject(Store);
	loading$$ = this.store.selectSignal(selectLoading);
}
