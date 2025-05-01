import { DOCUMENT } from "@angular/common";
import {
	Component,
	ElementRef,
	HostListener,
	Inject,
	Input,
	Renderer2,
	Signal,
	signal,
} from "@angular/core";

@Component({
	selector: "app-dropdown",
	standalone: true,
	templateUrl: "./dropdown.component.html",
	styleUrls: ["./dropdown.component.scss"],
})
export class DropdownComponent {
	@Input() trigger!: string;
	@Input() items!: { label: string }[];

	public isOpen = signal(false);

	private dropdownElement: HTMLElement | null = null;

	constructor(
		private elementRef: ElementRef,
		private renderer: Renderer2,
		@Inject(DOCUMENT) private document: Document,
	) {}

	toggleDropdown() {
		if (this.isOpen()) {
			this.closeDropdown();
		} else {
			this.openDropdown();
		}
	}

	openDropdown() {
		const triggerButton = this.elementRef.nativeElement.querySelector("button");
		const rect = triggerButton.getBoundingClientRect();
		const viewportHeight = window.innerHeight;
		const viewportWidth = window.innerWidth;
		const scrollY = window.scrollY;
		const scrollX = window.scrollX;

		// Crear el dropdown pero invisible
		this.dropdownElement = this.document.createElement("div");
		this.renderer.addClass(this.dropdownElement, "dropdown-menu");
		this.renderer.setStyle(this.dropdownElement, "position", "absolute");
		this.renderer.setStyle(this.dropdownElement, "opacity", "0");
		this.renderer.setStyle(this.dropdownElement, "pointer-events", "none");
		this.renderer.setStyle(this.dropdownElement, "visibility", "hidden");
		this.renderer.appendChild(document.body, this.dropdownElement);

		// Insertar contenido
		this.dropdownElement.innerHTML = this.items
			.map(
				(item) =>
					`<button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-700 hover:text-gray-100 transition duration-150 ease-in-out cursor-pointer">
           ${item.label}
         </button>`,
			)
			.join("");

		// Timeout corto para asegurar que el DOM lo procese
		setTimeout(() => {
			const dropdownHeight = this.dropdownElement?.offsetHeight ?? 100;
			const dropdownWidth = this.dropdownElement?.offsetWidth ?? 100;

			// Coordenadas básicas
			let top = rect.bottom + scrollY;
			let left = rect.left + scrollX;
			let transformOrigin = "top left";

			const spaceBelow = viewportHeight - rect.bottom;
			const spaceAbove = rect.top;
			const spaceRight = viewportWidth - rect.left;
			const spaceLeft = rect.right;

			// Vertical
			if (spaceBelow < dropdownHeight && spaceAbove > spaceBelow) {
				top = rect.top + scrollY - dropdownHeight;
				transformOrigin = "bottom left";
			}

			// Horizontal
			if (spaceRight < dropdownWidth && spaceLeft > spaceRight) {
				left = rect.right + scrollX - dropdownWidth;
				transformOrigin = transformOrigin.includes("top")
					? "top right"
					: "bottom right";
			}

			// Posicionar y mostrar
			this.renderer.setStyle(this.dropdownElement, "top", `${top}px`);
			this.renderer.setStyle(this.dropdownElement, "left", `${left}px`);
			this.renderer.setStyle(
				this.dropdownElement,
				"transform-origin",
				transformOrigin,
			);
			this.renderer.setStyle(this.dropdownElement, "opacity", "1");
			this.renderer.setStyle(this.dropdownElement, "pointer-events", "auto");
			this.renderer.setStyle(this.dropdownElement, "visibility", "visible");
		}, 0);

		this.isOpen.set(true);
	}

	closeDropdown() {
		if (this.dropdownElement) {
			document.body.removeChild(this.dropdownElement);
			this.dropdownElement = null;
		}
		this.isOpen.set(false);
	}

	@HostListener("document:mousedown", ["$event"])
	onDocumentClick(event: MouseEvent) {
		if (
			!this.elementRef.nativeElement.contains(event.target) &&
			!(
				this.dropdownElement &&
				this.dropdownElement.contains(event.target as Node)
			)
		) {
			this.closeDropdown();
		}
	}
}
