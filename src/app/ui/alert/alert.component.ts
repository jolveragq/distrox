import { CommonModule } from '@angular/common';
import { Component, EventEmitter, input, Output, signal } from '@angular/core';

@Component({
    selector: 'app-alert',
    imports: [CommonModule],
    templateUrl: './alert.component.html',
    styleUrl: './alert.component.scss',
})
export class AlertComponent {
    public variant = input('info');
    public title = input();
    public dismissible = input(false);
    public size = input('md'); // sm, md

    public visible = signal(true);

    @Output() dismissed = new EventEmitter<void>();

    onDismiss(): void {
        this.visible.set(false);
        this.dismissed.emit();
    }
}
