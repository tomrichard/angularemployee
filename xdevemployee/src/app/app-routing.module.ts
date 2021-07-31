import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { MainNavComponent } from './main-nav/main-nav.component';
import { EmployeeComponent } from './employee/employee.component';

const routes: Routes = [
	
	// use withoutsidenav
	{ path: 'login', 	component: LoginComponent },
	{ path: '', 		redirectTo: '/login', pathMatch: 'full'},

	// use sidenav
  	{ 	
  		path: '', 	
  		component: MainNavComponent,
  		children: [
			{
				path: 'home',
				component: HomeComponent
			},
			{
				path: 'employee',
				component: EmployeeComponent
			}
		] 
  	},

  	
	
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
