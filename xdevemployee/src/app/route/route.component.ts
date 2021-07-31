import { Component, OnInit } from '@angular/core';
import { NavigationService } from '../app-services/navigation.service';

@Component({
  selector: 'app-root',
  templateUrl: './route.component.html',
  styleUrls: ['./route.component.sass']
})
export class RouteComponent implements OnInit {

	showSidenav = false;

	constructor(private navigationService: NavigationService) { 
    
    var ref = this;

    navigationService.onChangeVisibility(function( status: boolean ) {
      ref.showSidenav = status;
    });

    this.showSidenav = navigationService.isShow();

	}

	ngOnInit(): void {
	}

}
