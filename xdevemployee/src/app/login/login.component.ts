import { Component, OnInit } from '@angular/core';
import { NavigationService } from '../app-services/navigation.service';

@Component({
	selector: 'app-login',
	templateUrl: './login.component.html',
	styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

	signup = false;

	constructor(private navigationService: NavigationService) { 
		navigationService.setDisabled();
	}

	ngOnInit(): void {
	}

	signupClick(): void {
		
		this.signup = true;

	}

	signinClick(): void {
		
		this.signup = false;

	}

}
