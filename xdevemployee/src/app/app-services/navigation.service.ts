import { Injectable } from '@angular/core';

@Injectable({
	providedIn: 'root',
})
export class NavigationService {

	show = false;
  onChangeVisibilityAction: Function;

	constructor() {
    this.onChangeVisibilityAction = function(status: boolean){};
  }

	setEnabled() {
		
    this.show = true;
    
    if( this.onChangeVisibilityAction != null ) {
      this.onChangeVisibilityAction(this.show);
    }

	}

	setDisabled() {
		this.show = false;

    if( this.onChangeVisibilityAction != null ) {
      this.onChangeVisibilityAction(this.show);
    }

	}

	isShow() {
		return this.show;
	}

  onChangeVisibility( funct: Function ) {
    this.onChangeVisibilityAction = funct;
  }

}