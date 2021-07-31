import { Component, OnInit } from '@angular/core';
import { NavigationService } from '../app-services/navigation.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

	employees = [] as any;

  	constructor(private navigationService: NavigationService) { 
		
		navigationService.setEnabled();
		
		this.employees = [
			{}, {}, {}, {}
		];

	}

	ngOnInit(): void {

	}

}
