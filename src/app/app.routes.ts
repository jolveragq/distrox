import { Routes } from '@angular/router';

export const routes: Routes = [
    {
        path: 'page-1',
        loadComponent: () => import('./pages/page-1/page-1.component').then(m => m.Page1Component)
    },
    {
        path: 'page-2',
        loadComponent: () => import('./pages/page-2/page-2.component').then(m => m.Page2Component)
    },
];
