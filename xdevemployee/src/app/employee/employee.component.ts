import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-employee',
  templateUrl: './employee.component.html',
  styleUrls: ['./employee.component.scss']
})
export class EmployeeComponent implements OnInit {

	employees = [] as any;
	showSearch = false;

	constructor() { 

		this.employees = [
			{}, {}, {}, {}
		];

	}

	ngOnInit(): void {
	}

}
