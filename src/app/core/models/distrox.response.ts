export interface DistroxResponse<T> {
	status: string;
	statusCode: number;
	data: T;
	message: string;
	request: any;
}
